<?php

namespace App\Services\User;

use App\Services\Contracts\User\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\Contracts\User\UserRepositoryInterface;
use Illuminate\Http\UploadedFile;
use App\Services\Contracts\Shared\FileStorageServiceInterface;

class UserService implements UserServiceInterface
{

public function __construct(
    private readonly UserRepositoryInterface $userRepository,
    private readonly FileStorageServiceInterface $fileStorageService
) {
}
    public function profile(): array
{
    return [

        'user' => new UserResource(Auth::user()),

    ];
}

public function updateProfile(array $data): array
{
    /** @var User $user */
    $user = Auth::user();

    $user = $this->userRepository->update(
        $user,
        [
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'] ?? null,
            'last_name' => $data['last_name'] ?? null,
            'display_name' => $data['display_name'],
            'email' => $data['email'] ?? null,
            'preferred_language' => $data['preferred_language'],
        ]
    );

    return [

        'user' => new UserResource($user),

    ];
}


public function uploadProfilePhoto(
    UploadedFile $photo
): array {

    /** @var \App\Models\User $user */
    $user = Auth::user();

    // Delete old profile photo
    $this->fileStorageService->delete(
        $user->profile_photo
    );

    // Upload new photo
    $path = $this->fileStorageService->upload(
        $photo,
        'profile-photos'
    );

    // Save in database
    $user = $this->userRepository->updateProfilePhoto(
        $user,
        $path
    );

    return [

        'user' => new UserResource($user),

    ];
}


}
