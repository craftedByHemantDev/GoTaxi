<?php

namespace App\Repositories\Contracts\Driver;

use App\Models\DriverVehicleDocument;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface DriverVehicleDocumentRepositoryInterface
{
    public function create(
        array $data
    ): DriverVehicleDocument;

    public function update(
        DriverVehicleDocument $document,
        array $data
    ): DriverVehicleDocument;

    public function delete(
        DriverVehicleDocument $document
    ): bool;

    public function findByUuid(
        string $uuid
    ): ?DriverVehicleDocument;

    public function findByVehicleAndType(
        int $vehicleId,
        string $documentType
    ): ?DriverVehicleDocument;

    public function getByVehicle(
        int $vehicleId
    ): Collection;

    public function pending(
        int $perPage = 20
    ): LengthAwarePaginator;
}
