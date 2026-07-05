<?php

namespace App\Actions\User;

use App\Services\Contracts\User\UserServiceInterface;

class DeleteProfilePhotoAction
{
    public function __construct(
        private readonly UserServiceInterface $userService
    ) {
    }

    public function execute(): array
    {
        return $this->userService->deleteProfilePhoto();
    }
}
