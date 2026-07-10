<?php

namespace App\Actions\Admin;

use App\Models\User;
use App\Models\DriverDocument;
use App\Services\Contracts\Driver\DriverVerificationServiceInterface;

class RejectDriverDocumentAction
{
    public function __construct(
        private readonly DriverVerificationServiceInterface $service
    ) {
    }

    public function execute(
        User $admin,
        DriverDocument $document,
        string $remarks
    ): DriverDocument {

        return $this->service->rejectDocument(

            $admin,

            $document,

            $remarks

        );
    }
}
