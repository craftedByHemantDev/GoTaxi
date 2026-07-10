<?php

namespace App\Services\Driver;

use App\Services\Contracts\Driver\DriverVehicleServiceInterface;
use App\Repositories\Contracts\Driver\DriverVehicleRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\DriverVehicle;

use App\Core\Exceptions\ApiException;
use Illuminate\Support\Collection;

class DriverVehicleService implements DriverVehicleServiceInterface
{
    public function __construct(

        private readonly DriverVehicleRepositoryInterface $repository

    ) {
    }

    public function register(
    User $user,
    array $data
): DriverVehicle {

    $driver = $user->driver;

    if (! $driver) {

        throw new ApiException(

            message: 'Driver not found.',

            status: 404

        );

    }

    $exists = $this->repository
        ->findByRegistrationNumber(
            $data['registration_number']
        );

    if ($exists) {

        throw new ApiException(

            message: 'Vehicle already registered.',

            status: 422

        );

    }

    return DB::transaction(function () use (

        $driver,
        $data

    ) {

        return $this->repository->create([

            'uuid' => Str::uuid(),

            'driver_id' => $driver->id,

            'vehicle_type' => $data['vehicle_type'],

            'brand' => $data['brand'],

            'model' => $data['model'],

            'color' => $data['color'],

            'manufacture_year' => $data['manufacture_year'],

            'registration_number' => strtoupper(
                $data['registration_number']
            ),

            'status' => 'pending',

            'is_active' => true,

        ]);

    });

}

public function list(
    User $user
): Collection {

    $driver = $user->driver;

    if (! $driver) {

        throw new ApiException(

            message: 'Driver not found.',

            status: 404

        );

    }

    return $this->repository->getByDriver(
        $driver->id
    );

}

public function update(
    User $user,
    string $uuid,
    array $data
): DriverVehicle {

    $driver = $user->driver;

    if (! $driver) {

        throw new ApiException(
            message: 'Driver not found.',
            status: 404
        );

    }

    $vehicle = $this->repository->findByUuid(
        $uuid
    );

    if (! $vehicle) {

        throw new ApiException(
            message: 'Vehicle not found.',
            status: 404
        );

    }

    if ($vehicle->driver_id !== $driver->id) {

        throw new ApiException(
            message: 'Vehicle not found.',
            status: 404
        );

    }

    if (isset($data['registration_number'])) {

        $exists = $this->repository
            ->findByRegistrationNumber(
                strtoupper($data['registration_number'])
            );

        if (

            $exists &&

            $exists->id !== $vehicle->id

        ) {

            throw new ApiException(

                message: 'Registration number already exists.',

                status: 422

            );

        }

        $data['registration_number'] = strtoupper(
            $data['registration_number']
        );

    }

    return $this->repository->update(
        $vehicle,
        $data
    );

}


public function delete(
    User $user,
    string $uuid
): void {

    $driver = $user->driver;

    if (! $driver) {

        throw new ApiException(
            message: 'Driver not found.',
            status: 404
        );

    }

    $vehicle = $this->repository->findByUuid(
        $uuid
    );

    if (! $vehicle) {

        throw new ApiException(
            message: 'Vehicle not found.',
            status: 404
        );

    }

    if ($vehicle->driver_id !== $driver->id) {

        throw new ApiException(
            message: 'Vehicle not found.',
            status: 404
        );

    }

    if ($vehicle->is_active) {

        throw new ApiException(
            message: 'Deactivate vehicle before deleting.',
            status: 422
        );

    }

    $this->repository->delete(
        $vehicle
    );

}

public function deactivate(
    User $user,
    string $uuid
): DriverVehicle {

    $driver = $user->driver;

    if (! $driver) {

        throw new ApiException(
            message: 'Driver not found.',
            status: 404
        );

    }

    $vehicle = $this->repository->findByUuid(
        $uuid
    );

    if (! $vehicle) {

        throw new ApiException(
            message: 'Vehicle not found.',
            status: 404
        );

    }

    if ($vehicle->driver_id != $driver->id) {

        throw new ApiException(
            message: 'Vehicle not found.',
            status: 404
        );

    }

    return $this->repository->update(

        $vehicle,

        [

            'is_active' => false

        ]

    );

}
}
