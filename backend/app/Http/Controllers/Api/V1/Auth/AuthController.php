<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Actions\Auth\SendLoginOtpAction;
use App\Core\Responses\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SendLoginOtpRequest;

class AuthController extends Controller
{
    public function __construct(
        private readonly SendLoginOtpAction $action
    ) {
    }

    public function sendLoginOtp(
        SendLoginOtpRequest $request
    ) {
        $result = $this->action->execute(
            $request->validated('country_code'),
            $request->validated('mobile')
        );

        return ApiResponse::success(
            data: $result,
            message: 'OTP sent successfully.'
        );
    }
}
