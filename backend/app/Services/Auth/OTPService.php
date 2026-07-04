<?php

namespace App\Services\Auth;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\Auth\OtpRepositoryInterface;
use App\Services\Contracts\Auth\OTPServiceInterface;

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

        DB::transaction(function () use (
            $countryCode,
            $mobile,
            $purpose,
            $ipAddress,
            $userAgent,
            &$otp
        ) {

            $this->otpRepository->deleteExpired();

            $otp = random_int(100000,999999);

            $this->otpRepository->create([

                'uuid'=>Str::uuid(),

                'country_code'=>$countryCode,

                'mobile'=>$mobile,

                'purpose'=>$purpose,

                'otp'=>$otp,

                'attempts'=>0,

                'expires_at'=>now()->addSeconds(
                    config('gotaxi.otp.expiry')
                ),

                'ip_address'=>$ipAddress,

                'user_agent'=>$userAgent

            ]);

        });

        return [

            'success'=>true,

            'otp'=>$otp,

            'expires_at'=>now()->addSeconds(
                config('gotaxi.otp.expiry')
            )

        ];
    }
}
