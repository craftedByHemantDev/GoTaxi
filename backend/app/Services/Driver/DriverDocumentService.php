<?php

namespace App\Services\Driver;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;


use App\Models\Driver;
use App\Models\DriverDocument;

use App\Services\Contracts\Driver\DriverDocumentServiceInterface;

use App\Repositories\Contracts\Driver\DriverDocumentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\User;
use App\Core\Exceptions\ApiException;

class DriverDocumentService implements DriverDocumentServiceInterface
{
    public function __construct(
        private readonly DriverDocumentRepositoryInterface $repository
    ) {
    }

    public function upload(
    Driver $driver,
    string $documentType,
    UploadedFile $file
): DriverDocument {

    return DB::transaction(function () use (

        $driver,
        $documentType,
        $file

    ) {

        /*
        |--------------------------------------------------------------------------
        | Phase 1
        | Existing document
        |--------------------------------------------------------------------------
        */

        $existing = $this->repository->findByDriverAndType(
            $driver->id,
            $documentType
        );

        /*
        |--------------------------------------------------------------------------
        | Phase 2
        | Generate filename
        |--------------------------------------------------------------------------
        */

        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();

        /*
        |--------------------------------------------------------------------------
        | Phase 3
        | Upload file
        |--------------------------------------------------------------------------
        */

        $path = $file->storeAs(

            'driver-documents',

            $filename,

            'public'

        );

        /*
        |--------------------------------------------------------------------------
        | Phase 4
        | Update or Create
        |--------------------------------------------------------------------------
        */

        if ($existing) {

            $document = $this->repository->update(

                $existing,

                [

                    'file_path' => $path,

                    'file_name' => $file->getClientOriginalName(),

                    'mime_type' => $file->getMimeType(),

                    'file_size' => $file->getSize(),

                    'status' => 'pending',

                    'remarks' => null,

                    'verified_at' => null,

                    'verified_by' => null,

                ]

            );

        } else {

            $document = $this->repository->create([

                'uuid' => Str::uuid(),

                'driver_id' => $driver->id,

                'document_type' => $documentType,

                'file_path' => $path,

                'file_name' => $file->getClientOriginalName(),

                'mime_type' => $file->getMimeType(),

                'file_size' => $file->getSize(),

                'status' => 'pending',

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | Phase 5
        | Delete old file
        |--------------------------------------------------------------------------
        */

        if (

            $existing &&

            $existing->file_path &&

            Storage::disk('public')->exists($existing->file_path)

        ) {

            Storage::disk('public')->delete(

                $existing->file_path

            );

        }

        return $document;

    });

}

public function list(
    Driver $driver
): Collection {

    return $this->repository->getByDriver(
        $driver->id
    );
}


public function pending(
    int $perPage = 20
): LengthAwarePaginator {

    return $this->repository->pending(
        $perPage
    );

}

public function deleteDocument(
    User $user,
    string $uuid
): void {

    $driver = $user->driver;

    $document = $this->repository->findByUuid(
        $uuid
    );

    if (! $document) {

        throw new ApiException(

            message: 'Document not found.',

            status: 404

        );

    }

    if ($document->driver_id !== $driver->id) {

        throw new ApiException(

            message: 'Document not found.',

            status: 404

        );

    }

    if (

        $document->file_path &&

        Storage::disk('public')->exists(
            $document->file_path
        )

    ) {

        Storage::disk('public')->delete(
            $document->file_path
        );

    }

    $this->repository->delete(
        $document
    );

}



}
