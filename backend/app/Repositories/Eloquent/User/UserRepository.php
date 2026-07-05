<?php

namespace App\Repositories\Eloquent\User;

use App\Models\User;
use App\Repositories\Contracts\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function findByMobile(
        string $countryCode,
        string $mobile
    ): ?User {

        return User::query()
            ->where('country_code', $countryCode)
            ->where('mobile', $mobile)
            ->first();
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(
        User $user,
        array $data
    ): User {

        $user->update($data);

        return $user->refresh();
    }

    public function existsByMobile(
    string $countryCode,
    string $mobile
): bool {

    return User::query()

        ->where('country_code', $countryCode)

        ->where('mobile', $mobile)

        ->exists();
}


}
