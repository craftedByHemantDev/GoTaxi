<?php

namespace App\Services\Contracts\Driver;

use App\Models\Driver;
use Illuminate\Http\UploadedFile;
use App\Models\DriverDocument;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\User;


interface DriverDocumentServiceInterface
{
    public function upload(
        Driver $driver,
        string $documentType,
        UploadedFile $file
    ): DriverDocument;


public function list(
    Driver $driver
): Collection;



public function pending(
    int $perPage = 20
): LengthAwarePaginator;

public function deleteDocument(
    User $user,
    string $uuid
): void;


}

