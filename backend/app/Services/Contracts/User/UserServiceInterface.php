<?php

namespace App\Services\Contracts\User;

interface UserServiceInterface
{
    public function profile(): array;

    public function updateProfile(array $data): array;
}
