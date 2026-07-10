<?php

namespace App\Services\Contracts\Driver;

use App\Models\User;
use App\Models\DriverVehicle;

    use Illuminate\Support\Collection;

interface DriverVehicleServiceInterface
{
    public function register(
        User $user,
        array $data
    ): DriverVehicle;

public function list(
    User $user
): Collection;


public function update(
    User $user,
    string $uuid,
    array $data
): DriverVehicle;
public function delete(
    User $user,
    string $uuid
): void;
public function deactivate(
    User $user,
    string $uuid
): DriverVehicle;

}
