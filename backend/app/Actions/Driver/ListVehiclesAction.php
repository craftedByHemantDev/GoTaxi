<?php

namespace App\Actions\Driver;

use App\Models\User;
use Illuminate\Support\Collection;

use App\Services\Contracts\Driver\DriverVehicleServiceInterface;

class ListVehiclesAction
{
    public function __construct(
        private readonly DriverVehicleServiceInterface $service
    ) {
    }

    public function execute(
        User $user
    ): Collection {

        return $this->service->list(
            $user
        );

    }
}
