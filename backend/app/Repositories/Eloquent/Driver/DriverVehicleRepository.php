<?php

namespace App\Repositories\Eloquent\Driver;

use App\Models\DriverVehicle;
use Illuminate\Support\Collection;
use App\Repositories\Contracts\Driver\DriverVehicleRepositoryInterface;

class DriverVehicleRepository implements DriverVehicleRepositoryInterface
{
    public function create(
        array $data
    ): DriverVehicle {

        return DriverVehicle::create($data);

    }

    public function update(
        DriverVehicle $vehicle,
        array $data
    ): DriverVehicle {

        $vehicle->update($data);

        return $vehicle->refresh();

    }

    public function findByUuid(
        string $uuid
    ): ?DriverVehicle {

        return DriverVehicle::where(
            'uuid',
            $uuid
        )->first();

    }

    public function findByRegistrationNumber(
        string $registrationNumber
    ): ?DriverVehicle {

        return DriverVehicle::where(
            'registration_number',
            $registrationNumber
        )->first();

    }

    public function getByDriver(
        int $driverId
    ): Collection {

        return DriverVehicle::where(
            'driver_id',
            $driverId
        )->latest()->get();

    }

    public function delete(
        DriverVehicle $vehicle
    ): bool {

        return $vehicle->delete();

    }



}
