<?php

namespace App\Services\Contracts\Auth;

interface OTPServiceInterface
{
    public function generate(
        string $countryCode,
        string $mobile,
        string $purpose,
        ?string $ipAddress = null,
        ?string $userAgent = null
    ): array;

 public function verify(
    string $countryCode,
    string $mobile,
    string $purpose,
    string $otp
): array;

public function getVerifiedRecord(
    string $verificationToken
);
}
