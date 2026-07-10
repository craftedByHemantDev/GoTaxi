<?php

namespace App\Actions\Driver;

use App\Models\User;

use App\Services\Contracts\Driver\DriverVehicleServiceInterface;

class DeleteVehicleAction
{
    public function __construct(
        private readonly DriverVehicleServiceInterface $service
    ) {
    }

    public function execute(
        User $user,
        string $uuid
    ): void {

        $this->service->delete(
            $user,
            $uuid
        );

    }
}
