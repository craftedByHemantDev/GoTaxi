<?php

namespace App\Repositories\Contracts\Driver;

use App\Models\Driver;
use App\Models\DriverVehicle;

interface DriverVehicleRepositoryInterface
{
    public function create(
        array $data
    ): DriverVehicle;

    public function update(
        DriverVehicle $vehicle,
        array $data
    ): DriverVehicle;

    public function findByUuid(
        string $uuid
    ): ?DriverVehicle;

    public function findByRegistrationNumber(
        string $registrationNumber
    ): ?DriverVehicle;

    public function getByDriver(
        int $driverId
    );

    public function delete(
        DriverVehicle $vehicle
    ): bool;
}
