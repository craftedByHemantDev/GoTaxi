<?php

namespace App\Actions\Auth;

use App\Services\Contracts\Auth\AuthServiceInterface;

class CompleteProfileAction
{
    public function __construct(
        private readonly AuthServiceInterface $authService
    ) {
    }

    public function execute(array $data): array
    {
        return $this->authService->completeProfile($data);
    }
}
