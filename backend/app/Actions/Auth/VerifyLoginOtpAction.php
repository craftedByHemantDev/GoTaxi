<?php

namespace App\Actions\Auth;

use App\Services\Contracts\Auth\AuthServiceInterface;

class VerifyLoginOtpAction
{
    public function __construct(
        private readonly AuthServiceInterface $authService
    ) {
    }

    public function execute(
        string $countryCode,
        string $mobile,
        string $otp
    ): array {
        return $this->authService->verifyLoginOtp(
            countryCode: $countryCode,
            mobile: $mobile,
            otp: $otp
        );
    }
}
