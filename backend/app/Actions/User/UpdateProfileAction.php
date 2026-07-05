<?php

namespace App\Actions\User;

use App\Services\Contracts\User\UserServiceInterface;

class UpdateProfileAction
{
    public function __construct(
        private readonly UserServiceInterface $userService
    ) {
    }

    public function execute(array $data): array
    {
        return $this->userService->updateProfile($data);
    }
}
