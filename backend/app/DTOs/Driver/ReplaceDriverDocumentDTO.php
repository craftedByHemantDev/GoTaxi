<?php

namespace App\DTOs\Driver;

use Illuminate\Http\UploadedFile;

class ReplaceDriverDocumentDTO
{
    public function __construct(
        public readonly string $documentType,
        public readonly UploadedFile $file,
    ) {}
}
