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
use App\Actions\Auth\LogoutAction;
use App\Actions\Auth\LogoutAllDevicesAction;

class AuthController extends Controller
{
    public function __construct(
        private readonly SendLoginOtpAction $sendLoginOtpAction,
        private readonly VerifyLoginOtpAction $verifyLoginOtpAction,
        private readonly CompleteProfileAction $completeProfileAction,
        private readonly LogoutAction $logoutAction,
        private readonly LogoutAllDevicesAction $logoutAllDevicesAction,

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


public function logout()
{
    $this->logoutAction->execute();

    return ApiResponse::success(

        [],

        'Logged out successfully.'

    );
}


public function logoutAllDevices()
{
    $this->logoutAllDevicesAction->execute();

    return ApiResponse::success(

        [],

        'Logged out from all devices successfully.'

    );
}



}
