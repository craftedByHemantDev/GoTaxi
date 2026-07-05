<?php

namespace App\Repositories\Contracts\Auth;

use App\Models\OtpVerification;

interface OtpRepositoryInterface
{
    public function create(array $data): OtpVerification;

    public function findLatest(
        string $countryCode,
        string $mobile,
        string $purpose
    ): ?OtpVerification;

    public function update(
        OtpVerification $otp,
        array $data
    ): OtpVerification;

    public function delete(OtpVerification $otp): bool;

    public function deleteExpired(): void;

    public function findActiveOtp(
        string $countryCode,
        string $mobile,
        string $purpose
    ): ?OtpVerification;

    public function countActiveOtps(
        string $countryCode,
        string $mobile,
        string $purpose
    ): int;

    public function findLatestActive(
        string $countryCode,
        string $mobile,
        string $purpose
    ): ?OtpVerification;

    public function findByVerificationToken(
    string $token
): ?OtpVerification;

public function deleteByVerificationToken(
    string $token
): void;
}
