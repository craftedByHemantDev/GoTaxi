<?php

namespace App\Repositories\Contracts\Driver;

use App\Models\Driver;

interface DriverRepositoryInterface
{
    public function create(array $data): Driver;

    public function findByUserId(
        int $userId
    ): ?Driver;

    public function update(
        Driver $driver,
        array $data
    ): Driver;

    public function updateStatus(
    int $driverId,
    string $status
);


}
