<?php

namespace App\Actions\User;

use Illuminate\Http\UploadedFile;
use App\Services\Contracts\User\UserServiceInterface;

class UploadProfilePhotoAction
{
    public function __construct(
        private readonly UserServiceInterface $userService
    ) {
    }

    public function execute(
        UploadedFile $photo
    ): array {

        return $this->userService->uploadProfilePhoto(
            $photo
        );
    }
}
