<?php

namespace App\Services\Contracts\Driver;

interface DriverServiceInterface
{
    public function register(
        int $userId,
        array $data
    ): array;
}
