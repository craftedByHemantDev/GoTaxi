<?php

namespace App\Actions\Driver;

use App\Models\User;
use App\Services\Contracts\Driver\DriverDocumentServiceInterface;

class DeleteDriverDocumentAction
{
    public function __construct(
        private readonly DriverDocumentServiceInterface $service
    ) {
    }

    public function execute(
        User $user,
        string $uuid
    ): void {

        $this->service->deleteDocument(

            $user,

            $uuid

        );

    }
}
