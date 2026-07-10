<?php

namespace App\Repositories\Eloquent\Driver;

use App\Models\Driver;
use App\Models\DriverDocument;
use App\Repositories\Contracts\Driver\DriverRepositoryInterface;

class DriverRepository implements DriverRepositoryInterface
{
    public function create(array $data): Driver
    {
        return Driver::create($data);
    }

    public function findByUserId(
        int $userId
    ): ?Driver {

        return Driver::where(
            'user_id',
            $userId
        )->first();

    }

    public function update(
        Driver $driver,
        array $data
    ): Driver {

        $driver->update($data);

        return $driver->refresh();

    }

    public function findByUuid(
    string $uuid
): ?DriverDocument {

    return DriverDocument::where(
        'uuid',
        $uuid
    )->first();
}

public function updateStatus(
    int $driverId,
    string $status
): bool {

    return Driver::where(
        'id',
        $driverId
    )->update([
        'status' => $status,
    ]);

}
}
