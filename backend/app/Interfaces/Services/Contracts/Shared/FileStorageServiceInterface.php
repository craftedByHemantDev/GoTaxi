<?php

namespace App\Services\Contracts\Shared;

use Illuminate\Http\UploadedFile;

interface FileStorageServiceInterface
{
    public function upload(
        UploadedFile $file,
        string $directory
    ): string;

    public function delete(
        ?string $path
    ): void;
}
