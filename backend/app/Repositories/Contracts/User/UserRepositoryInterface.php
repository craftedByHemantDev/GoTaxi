<?php

namespace App\Repositories\Contracts\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $data): User;

    public function update(User $user, array $data): User;

    public function findById(int $id): ?User;

    public function findByUuid(string $uuid): ?User;

    public function findByMobile(string $countryCode, string $mobile): ?User;

    public function findByEmail(string $email): ?User;

    public function delete(User $user): bool;
}
