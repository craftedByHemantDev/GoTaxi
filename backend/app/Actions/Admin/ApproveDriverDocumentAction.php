<?php

namespace App\Actions\Admin;

use App\Models\User;
use App\Models\DriverDocument;
use App\Services\Contracts\Driver\DriverVerificationServiceInterface;

class ApproveDriverDocumentAction
{
    public function __construct(
        private readonly DriverVerificationServiceInterface $service
    ) {
    }

    public function execute(
        User $admin,
        DriverDocument $document,
        ?string $remarks = null
    ): DriverDocument {

        return $this->service->approveDocument(

            $admin,

            $document,

            $remarks

        );
    }
}
