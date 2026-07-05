<?php

namespace App\Actions\Auth;

use App\Services\Contracts\Auth\AuthServiceInterface;

class LogoutAction
{
    public function __construct(
        private readonly AuthServiceInterface $authService
    ) {
    }

    public function execute(): void
    {
        $this->authService->logout();
    }
}
