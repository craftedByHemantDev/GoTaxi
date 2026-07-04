<?php

namespace App\OTP\Hashers;

use Illuminate\Support\Facades\Hash;

class OTPHasher
{
    public function make(string $otp): string
    {
        return Hash::make($otp);
    }

    public function check(
        string $plainOtp,
        string $hashedOtp
    ): bool {
        return Hash::check($plainOtp, $hashedOtp);
    }
}
