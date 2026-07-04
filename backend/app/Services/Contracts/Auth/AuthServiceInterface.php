<?php

namespace App\Services\Contracts\Auth;

interface AuthServiceInterface
{
    public function sendLoginOtp(
        string $countryCode,
        string $mobile
    ): array;
}
