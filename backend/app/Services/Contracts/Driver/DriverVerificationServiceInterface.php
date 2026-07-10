<?php

namespace App\Services\Contracts\Driver;

use App\Models\User;
use App\Models\DriverDocument;

interface DriverVerificationServiceInterface
{
    public function approveDocument(
        User $admin,
        DriverDocument $document,
        ?string $remarks = null
    ): DriverDocument;

    public function rejectDocument(
        User $admin,
        DriverDocument $document,
        string $remarks
    ): DriverDocument;
}
