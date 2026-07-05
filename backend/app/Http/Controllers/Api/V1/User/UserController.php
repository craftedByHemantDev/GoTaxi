<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Actions\User\GetProfileAction;
use App\Core\Responses\ApiResponse;
use App\Http\Controllers\Controller;
use App\Actions\User\UpdateProfileAction;
use App\Http\Requests\User\UpdateProfileRequest;

class UserController extends Controller
{
    public function __construct(
        private readonly GetProfileAction $getProfileAction,
        private readonly UpdateProfileAction $updateProfileAction
    ) {
    }

    public function profile()
    {
        return ApiResponse::success(

            $this->getProfileAction->execute(),

            'Profile fetched successfully.'

        );
    }

    public function updateProfile(
    UpdateProfileRequest $request
) {
    return ApiResponse::success(

        $this->updateProfileAction->execute(
            $request->validated()
        ),

        'Profile updated successfully.'

    );
}
}
