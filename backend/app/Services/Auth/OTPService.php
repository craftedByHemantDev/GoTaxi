<?php

namespace App\Services\Auth;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\Auth\OtpRepositoryInterface;
use App\Services\Contracts\Auth\OTPServiceInterface;
use Illuminate\Support\Facades\Hash;
use App\Core\Exceptions\ApiException;
use App\Enums\Core\ErrorCode;


class OTPService implements OTPServiceInterface
{
    public function __construct(
        private readonly OtpRepositoryInterface $otpRepository
    ) {
    }

    public function generate(
        string $countryCode,
        string $mobile,
        string $purpose,
        string|null $ipAddress = null,
        string|null $userAgent = null
    ): array {

        $plainOtp = (string) random_int(100000, 999999);

DB::transaction(function () use (
    $countryCode,
    $mobile,
    $purpose,
    $ipAddress,
    $userAgent,
    $plainOtp
) {

// TODO: Move expired OTP cleanup to scheduled job.
    $this->otpRepository->deleteExpired();

    $count = $this->otpRepository->countActiveOtps(
    $countryCode,
    $mobile,
    $purpose
);

if ($count > 0) {

    throw new ApiException(
        message: 'Please wait before requesting another OTP.',
        status: 429,
        errors: [
            'code' => ErrorCode::OTP_RESEND_LIMIT->value,
        ]
    );
}

    $this->otpRepository->create([

        'uuid' => Str::uuid(),

        'country_code' => $countryCode,

        'mobile' => $mobile,

        'purpose' => $purpose,

        'otp' => Hash::make($plainOtp),

        'attempts' => 0,

        'expires_at' => now()->addSeconds(
    (int) config('gotaxi.otp.expiry')
),

        'ip_address' => $ipAddress,

        'user_agent' => $userAgent,

    ]);

});
        $response = [

                'expires_in' => (int) config('gotaxi.otp.expiry'),
            ];

            if (config('gotaxi.otp.show_in_response')) {
                $response['otp'] = $plainOtp;
            }

        return $response;
    }
}
