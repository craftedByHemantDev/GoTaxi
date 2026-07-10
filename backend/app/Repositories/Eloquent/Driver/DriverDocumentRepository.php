<?php

namespace App\Repositories\Eloquent\Driver;

use App\Models\DriverDocument;
use App\Repositories\Contracts\Driver\DriverDocumentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Enums\Driver\DocumentStatus;

class DriverDocumentRepository implements DriverDocumentRepositoryInterface
{
    public function create(array $data): DriverDocument
    {
        return DriverDocument::create($data);
    }

    public function findByDriverAndType(
        int $driverId,
        string $documentType
    ): ?DriverDocument {

        return DriverDocument::where('driver_id', $driverId)
            ->where('document_type', $documentType)
            ->first();
    }

    public function update(
        DriverDocument $document,
        array $data
    ): DriverDocument {

        $document->update($data);

        return $document->refresh();
    }

    public function delete(
        DriverDocument $document
    ): bool {

        return (bool) $document->delete();
    }

    public function getByDriver(
    int $driverId
) {

    return DriverDocument::query()

        ->where('driver_id', $driverId)

        ->latest('id')

        ->get();
}
public function pending(
    int $perPage = 20
): LengthAwarePaginator {

    return DriverDocument::query()

        ->with('driver.user')

        ->where('status', 'pending')

        ->latest('id')

        ->paginate($perPage);

}



public function findByUuid(
    string $uuid
): ?DriverDocument {

    return DriverDocument::where(
        'uuid',
        $uuid
    )->first();
}



public function approve(
    DriverDocument $document,
    int $adminId,
    ?string $remarks = null
): DriverDocument {

    $document->update([

        'status' => DocumentStatus::APPROVED,

        'verified_at' => now(),

        'verified_by' => $adminId,

        'remarks' => $remarks,

    ]);

    return $document;
}

public function reject(
    DriverDocument $document,
    int $adminId,
    string $remarks
): DriverDocument {

    $document->update([

        'status' => DocumentStatus::REJECTED,

        'verified_at' => now(),

        'verified_by' => $adminId,

        'remarks' => $remarks,

    ]);

    return $document;
}


public function countPendingDocuments(
    int $driverId
): int {

    return DriverDocument::where(
        'driver_id',
        $driverId
    )
    ->where(
        'status',
        'pending'
    )
    ->count();

}

public function countRejectedDocuments(
    int $driverId
): int {

    return DriverDocument::where(
        'driver_id',
        $driverId
    )
    ->where(
        'status',
        'rejected'
    )
    ->count();

}

public function countApprovedDocuments(
    int $driverId
): int {

    return DriverDocument::where(
        'driver_id',
        $driverId
    )
    ->where(
        'status',
        'approved'
    )
    ->count();

}


public function totalDocuments(
    int $driverId
): int {

    return DriverDocument::where(
        'driver_id',
        $driverId
    )->count();

}

public function uploadedDocumentTypes(
    int $driverId
): array {

    return DriverDocument::where(
        'driver_id',
        $driverId
    )
    ->pluck('document_type')
    ->toArray();

}


}
