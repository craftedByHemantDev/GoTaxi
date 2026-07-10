<?php

namespace App\Actions\Driver;

use App\Services\Contracts\Driver\DriverServiceInterface;

class RegisterDriverAction
{
    public function __construct(
        private readonly DriverServiceInterface $driverService
    ) {
    }

    public function execute(
        int $userId,
        array $data
    ): array {

        return $this->driverService->register(
            $userId,
            $data
        );

    }
}
