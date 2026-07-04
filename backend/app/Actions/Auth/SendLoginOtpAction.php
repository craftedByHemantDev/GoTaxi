<?php

namespace App\Actions\Auth;

use App\Services\Contracts\Auth\AuthServiceInterface;

class SendLoginOtpAction
{
    public function __construct(
        private readonly AuthServiceInterface $authService
    ) {
    }

    public function execute(
        string $countryCode,
        string $mobile
    ): array {
        return $this->authService->sendLoginOtp(
            $countryCode,
            $mobile
        );
    }
}
