<?php

namespace App\Actions\Driver;

use App\Models\User;
use App\Models\DriverVehicle;

use App\Services\Contracts\Driver\DriverVehicleServiceInterface;

class UpdateVehicleAction
{
    public function __construct(
        private readonly DriverVehicleServiceInterface $service
    ) {
    }

    public function execute(
        User $user,
        string $uuid,
        array $data
    ): DriverVehicle {

        return $this->service->update(
            $user,
            $uuid,
            $data
        );

    }
}
