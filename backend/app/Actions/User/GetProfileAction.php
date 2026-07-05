<?php

namespace App\Actions\User;

use App\Services\Contracts\User\UserServiceInterface;

class GetProfileAction
{
    public function __construct(
        private readonly UserServiceInterface $userService
    ) {
    }

    public function execute()
    {
        return $this->userService->profile();
    }
}
