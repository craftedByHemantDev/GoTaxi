<?php

namespace App\OTP\Validators;

use App\Core\Exceptions\ApiException;
use App\Enums\Core\ErrorCode;
use App\Models\OtpVerification;

class OTPCooldownValidator
{
    public function validate(?OtpVerification $otp): void
    {
        if (! $otp) {
            return;
        }

        $cooldown = config('gotaxi.otp.cooldown');

        if ($otp->created_at->diffInSeconds(now()) < $cooldown) {

            throw new ApiException(
                message: 'Please wait before requesting another OTP.',
                status: 429,
                errors: [
                    'code' => ErrorCode::OTP_RESEND_LIMIT->value,
                ]
            );
        }
    }
}
