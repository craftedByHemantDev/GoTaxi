<?php

namespace App\Repositories\Contracts\User;

use App\Models\User;


interface UserRepositoryInterface
{
    public function findByMobile(
        string $countryCode,
        string $mobile
    ): ?User;

    public function create(array $data): User;

    public function update(
        User $user,
        array $data
    ): User;
    public function existsByMobile(
    string $countryCode,
    string $mobile
): bool;



}
