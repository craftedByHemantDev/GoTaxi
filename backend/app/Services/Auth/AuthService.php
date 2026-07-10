<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use App\Enums\Auth\OtpPurpose;
use App\Services\Contracts\Auth\AuthServiceInterface;
use App\Services\Contracts\Auth\OTPServiceInterface;
use App\Models\User;
use Illuminate\Support\Str;
use App\Repositories\Contracts\User\UserRepositoryInterface;
use App\Core\Enums\ErrorCode;
use App\Core\Exceptions\ApiException;
use Illuminate\Support\Facades\Auth;
use App\Services\Auth\OTPService;
use App\Enums\User\UserStatus;
use App\Repositories\Contracts\Auth\OtpRepositoryInterface;

class AuthService implements AuthServiceInterface
{
    public function __construct(
    private readonly OTPServiceInterface $otpService,
    private readonly UserRepositoryInterface $userRepository,
    private readonly OtpRepositoryInterface $otpRepository,
) {
}

    public function sendLoginOtp(
        string $countryCode,
        string $mobile
    ): array {

        return $this->otpService->generate(
            countryCode: $countryCode,
            mobile: $mobile,
            purpose: OtpPurpose::LOGIN->value,
            ipAddress: request()->ip(),
            userAgent: request()->userAgent()
        );
    }
    public function verifyLoginOtp(
    string $countryCode,
    string $mobile,
    string $otp
): array {

    $result = $this->otpService->verify(

    countryCode: $countryCode,

    mobile: $mobile,

    purpose: OtpPurpose::LOGIN->value,

    otp: $otp

);

    return $result;
}
public function completeProfile(array $data): array
{
    return DB::transaction(function () use ($data) {

        $otpRecord = $this->otpService->getVerifiedRecord(
            $data['verification_token']
        );

        if (
            $this->userRepository->existsByMobile(
                $otpRecord->country_code,
                $otpRecord->mobile
            )
        ) {

            throw new ApiException(

                message: 'User already exists.',

                status: 409,

                errors: [

                    'code' => ErrorCode::USER_ALREADY_EXISTS->value,

                ]
            );
        }

        $user = $this->userRepository->create([

            'uuid' => Str::uuid(),

            'first_name' => $data['first_name'],

            'middle_name' => $data['middle_name'] ?? null,

            'last_name' => $data['last_name'] ?? null,

            'display_name' => $data['display_name'],

            'country_code' => $otpRecord->country_code,

            'mobile' => $otpRecord->mobile,

            'email' => $data['email'] ?? null,

            'preferred_language' => $data['preferred_language'] ?? 'en',

            'mobile_verified_at' => now(),

        ]);

        $this->otpRepository->deleteByVerificationToken(
            $data['verification_token']
        );

        $token = $user->createToken('customer')->plainTextToken;

        return [

            'user' => $user,

            'token' => $token,

        ];
    });
}


public function logout(): void
{
    /** @var \App\Models\User $user */
    $user = Auth::user();

    $user
        ->currentAccessToken()
        ->delete();
}

public function logoutAllDevices(): void
{
    /** @var \App\Models\User $user */
    $user = Auth::user();

    $user->tokens()->delete();
}

}
