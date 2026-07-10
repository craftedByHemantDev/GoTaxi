<?php

namespace App\Services\Driver;

use Illuminate\Support\Facades\DB;
use App\Models\DriverDocument;
use App\Models\User;
use App\Services\Contracts\Driver\DriverVerificationServiceInterface;
use App\Repositories\Contracts\Driver\DriverRepositoryInterface;

use App\Repositories\Contracts\Driver\DriverDocumentRepositoryInterface;

class DriverVerificationService implements DriverVerificationServiceInterface
{
public function __construct(

    private readonly DriverDocumentRepositoryInterface $repository,

    private readonly DriverRepositoryInterface $driverRepository

) {
}

    public function approveDocument(
    User $admin,
    DriverDocument $document,
    ?string $remarks = null
): DriverDocument {

    return DB::transaction(function () use (

        $admin,
        $document,
        $remarks

    ) {

        $document = $this->repository->approve(

            $document,

            $admin->id,

            $remarks

        );

        $this->syncDriverStatus(
            $document->driver_id
        );

        return $document;

    });

}

public function rejectDocument(
    User $admin,
    DriverDocument $document,
    string $remarks
): DriverDocument {

    return DB::transaction(function () use (

        $admin,
        $document,
        $remarks

    ) {

        $document = $this->repository->reject(

            $document,

            $admin->id,

            $remarks

        );

        $this->syncDriverStatus(
            $document->driver_id
        );

        return $document;

    });

}
private function syncDriverStatus(
    int $driverId
): void {

    $pending = $this->repository->countPendingDocuments(
        $driverId
    );

    $rejected = $this->repository->countRejectedDocuments(
        $driverId
    );

    $approved = $this->repository->countApprovedDocuments(
        $driverId
    );

    $total = $this->repository->totalDocuments(
        $driverId
    );

    if ($rejected > 0) {

        $this->driverRepository->updateStatus(
            $driverId,
            'rejected'
        );

        return;
    }

if (

    $this->hasAllRequiredDocuments(
        $driverId
    ) &&

    $approved === $total

) {

    $this->driverRepository->updateStatus(

        $driverId,

        'approved'

    );

    return;

}

    $this->driverRepository->updateStatus(
        $driverId,
        'pending'
    );

}


private function hasAllRequiredDocuments(
    int $driverId
): bool {

    $required = config(
        'driver.required_documents'
    );

    $uploaded = $this->repository
        ->uploadedDocumentTypes(
            $driverId
        );

    foreach ($required as $document) {

        if (! in_array($document, $uploaded)) {

            return false;

        }

    }

    return true;

}




}

