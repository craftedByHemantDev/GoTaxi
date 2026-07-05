<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Actions\User\GetProfileAction;
use App\Core\Responses\ApiResponse;
use App\Http\Controllers\Controller;
use App\Actions\User\UpdateProfileAction;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Actions\User\UploadProfilePhotoAction;
use App\Http\Requests\User\UploadProfilePhotoRequest;
use App\Actions\User\DeleteProfilePhotoAction;

class UserController extends Controller
{
    public function __construct(
        private readonly GetProfileAction $getProfileAction,
        private readonly UpdateProfileAction $updateProfileAction,
        private readonly UploadProfilePhotoAction $uploadProfilePhotoAction,
        private readonly DeleteProfilePhotoAction $deleteProfilePhotoAction
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

public function uploadProfilePhoto(
    UploadProfilePhotoRequest $request
) {

    return ApiResponse::success(

        $this->uploadProfilePhotoAction->execute(

            $request->file('photo')

        ),

        'Profile photo uploaded successfully.'

    );

}

public function deleteProfilePhoto()
{
    return ApiResponse::success(

        $this->deleteProfilePhotoAction->execute(),

        'Profile photo deleted successfully.'

    );
}


}
