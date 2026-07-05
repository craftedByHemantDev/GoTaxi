<?php

namespace App\Services\Contracts\User;

    use Illuminate\Http\UploadedFile;

interface UserServiceInterface
{
    public function profile(): array;

    public function updateProfile(array $data): array;

public function uploadProfilePhoto(
    UploadedFile $photo
): array;
}
