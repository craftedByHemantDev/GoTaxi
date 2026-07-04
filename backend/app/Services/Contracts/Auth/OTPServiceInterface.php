<?php

namespace App\Services\Contracts\Auth;

interface OTPServiceInterface
{
    public function generate(
        string $countryCode,
        string $mobile,
        string $purpose,
        string|null $ipAddress = null,
        string|null $userAgent = null
    ): array;
}
