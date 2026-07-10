<?php

namespace App\Actions\Driver;

use App\Models\User;

use App\Models\DriverVehicle;

use App\Services\Contracts\Driver\DriverVehicleServiceInterface;

class RegisterVehicleAction
{
    public function __construct(

        private readonly DriverVehicleServiceInterface $service

    ) {
    }

    public function execute(
        User $user,
        array $data
    ): DriverVehicle {

        return $this->service->register(

            $user,

            $data

        );

    }
}
