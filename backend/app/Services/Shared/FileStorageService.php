<?php

namespace App\Services\Shared;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use App\Services\Contracts\Shared\FileStorageServiceInterface;

class FileStorageService implements FileStorageServiceInterface
{
    public function upload(
        UploadedFile $file,
        string $directory
    ): string {

        $extension = $file->getClientOriginalExtension();

        $filename = Str::uuid().'.'.$extension;

        return $file->storeAs(
            $directory,
            $filename,
            'public'
        );
    }

    public function delete(
        ?string $path
    ): void {

        if ($path && Storage::disk('public')->exists($path)) {

            Storage::disk('public')->delete($path);

        }
    }
}
