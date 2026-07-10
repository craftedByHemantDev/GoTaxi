<?php

namespace App\Repositories\Driver;

use App\Models\DriverVehicleDocument;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

use App\Repositories\Contracts\Driver\DriverVehicleDocumentRepositoryInterface;

class DriverVehicleDocumentRepository implements DriverVehicleDocumentRepositoryInterface
{
    public function create(
        array $data
    ): DriverVehicleDocument {

        return DriverVehicleDocument::create(
            $data
        );
    }

    public function update(
        DriverVehicleDocument $document,
        array $data
    ): DriverVehicleDocument {

        $document->update(
            $data
        );

        return $document->refresh();
    }

    public function delete(
        DriverVehicleDocument $document
    ): bool {

        return (bool) $document->delete();
    }

    public function findByUuid(
        string $uuid
    ): ?DriverVehicleDocument {

        return DriverVehicleDocument::where(
            'uuid',
            $uuid
        )->first();
    }

    public function findByVehicleAndType(
        int $vehicleId,
        string $documentType
    ): ?DriverVehicleDocument {

        return DriverVehicleDocument::where(
            'driver_vehicle_id',
            $vehicleId
        )
        ->where(
            'document_type',
            $documentType
        )
        ->first();
    }

    public function getByVehicle(
        int $vehicleId
    ): Collection {

        return DriverVehicleDocument::where(
            'driver_vehicle_id',
            $vehicleId
        )
        ->latest()
        ->get();
    }

    public function pending(
        int $perPage = 20
    ): LengthAwarePaginator {

        return DriverVehicleDocument::where(
            'status',
            'pending'
        )
        ->latest()
        ->paginate(
            $perPage
        );
    }
}
