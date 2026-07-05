<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Actions\Auth\SendLoginOtpAction;
use App\Actions\Auth\VerifyLoginOtpAction;
use App\Core\Responses\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SendLoginOtpRequest;
use App\Http\Requests\Auth\VerifyLoginOtpRequest;
use App\Actions\Auth\CompleteProfileAction;
use App\Http\Requests\Auth\CompleteProfileRequest;

class AuthController extends Controller
{
    public function __construct(
        private readonly SendLoginOtpAction $sendLoginOtpAction,
        private readonly VerifyLoginOtpAction $verifyLoginOtpAction,
        private readonly CompleteProfileAction $completeProfileAction,
    ) {}

    public function sendLoginOtp(
        SendLoginOtpRequest $request
    ) {
        $result = $this->sendLoginOtpAction->execute(
            $request->validated('country_code'),
            $request->validated('mobile')
        );

        return ApiResponse::success(
            data: $result,
            message: 'OTP sent successfully.'
        );
    }

    public function verifyLoginOtp(
        VerifyLoginOtpRequest $request
    ) {
        $result = $this->verifyLoginOtpAction->execute(
            countryCode: $request->validated('country_code'),
            mobile: $request->validated('mobile'),
            otp: $request->validated('otp'),
        );

        return ApiResponse::success(
            data: $result,
            message: 'OTP verified successfully.'
        );
    }

    public function completeProfile(
    CompleteProfileRequest $request
) {

    $result = $this->completeProfileAction->execute(
        $request->validated()
    );

    return ApiResponse::success(

        $result,

        'Profile completed successfully.'

    );
}
}
