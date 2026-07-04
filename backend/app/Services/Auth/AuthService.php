<?php

namespace App\Services\Auth;

use App\Enums\Auth\OtpPurpose;
use App\Services\Contracts\Auth\AuthServiceInterface;
use App\Services\Contracts\Auth\OTPServiceInterface;

class AuthService implements AuthServiceInterface
{
    public function __construct(
        private readonly OTPServiceInterface $otpService
    ) {
    }

    public function sendLoginOtp(
        string $countryCode,
        string $mobile
    ): array {

        return $this->otpService->generate(
            countryCode: $countryCode,
            mobile: $mobile,
            purpose: OtpPurpose::LOGIN->value,
            ipAddress: request()->ip(),
            userAgent: request()->userAgent()
        );
    }
}
