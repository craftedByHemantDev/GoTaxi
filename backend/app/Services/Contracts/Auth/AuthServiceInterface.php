<?php

namespace App\Services\Contracts\Auth;

interface AuthServiceInterface
{
    public function sendLoginOtp(
        string $countryCode,
        string $mobile
    ): array;

    public function verifyLoginOtp(
        string $countryCode,
        string $mobile,
        string $otp
    ): array;

    public function completeProfile(array $data): array;

    public function logout(): void;

    public function logoutAllDevices(): void;
}
