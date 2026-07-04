<?php

namespace App\Repositories\Eloquent\User;

use App\Models\User;
use App\Repositories\Contracts\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(User $user, array $data): User
    {
        $user->update($data);

        return $user->refresh();
    }

    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    public function findByUuid(string $uuid): ?User
    {
        return User::where('uuid', $uuid)->first();
    }

    public function findByMobile(string $countryCode, string $mobile): ?User
    {
        return User::where('country_code', $countryCode)
            ->where('mobile', $mobile)
            ->first();
    }

    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function delete(User $user): bool
    {
        return (bool) $user->delete();
    }
}
