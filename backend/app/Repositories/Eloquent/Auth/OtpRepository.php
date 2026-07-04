<?php

namespace App\Repositories\Eloquent\Auth;

use App\Models\OtpVerification;
use App\Repositories\Contracts\Auth\OtpRepositoryInterface;

class OtpRepository implements OtpRepositoryInterface
{
    public function create(array $data): OtpVerification
    {
        return OtpVerification::create($data);
    }

    public function findLatest(
        string $countryCode,
        string $mobile,
        string $purpose
    ): ?OtpVerification {
        return OtpVerification::where('country_code', $countryCode)
            ->where('mobile', $mobile)
            ->where('purpose', $purpose)
            ->latest()
            ->first();
    }

    public function update(
        OtpVerification $otp,
        array $data
    ): OtpVerification {
        $otp->update($data);

        return $otp->refresh();
    }

    public function delete(OtpVerification $otp): bool
    {
        return (bool) $otp->delete();
    }

    public function deleteExpired(): void
    {
        OtpVerification::where('expires_at', '<', now())->delete();
    }
}
