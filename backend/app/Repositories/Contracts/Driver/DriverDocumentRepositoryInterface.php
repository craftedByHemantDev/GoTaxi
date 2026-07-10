<?php

namespace App\Repositories\Contracts\Driver;

use App\Models\DriverDocument;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface DriverDocumentRepositoryInterface
{
    public function create(array $data): DriverDocument;

    public function findByDriverAndType(
        int $driverId,
        string $documentType
    ): ?DriverDocument;

    public function update(
        DriverDocument $document,
        array $data
    ): DriverDocument;

    public function delete(
        DriverDocument $document
    ): bool;

public function getByDriver(
    int $driverId
);


public function pending(
    int $perPage = 20
): LengthAwarePaginator;



public function findByUuid(
    string $uuid
);



public function approve(
    DriverDocument $document,
    int $adminId,
    ?string $remarks = null
);

public function reject(
    DriverDocument $document,
    int $adminId,
    string $remarks
);

public function countPendingDocuments(
    int $driverId
): int;

public function countRejectedDocuments(
    int $driverId
): int;

public function countApprovedDocuments(
    int $driverId
): int;

public function totalDocuments(
    int $driverId
): int;

public function uploadedDocumentTypes(
    int $driverId
): array;



}

