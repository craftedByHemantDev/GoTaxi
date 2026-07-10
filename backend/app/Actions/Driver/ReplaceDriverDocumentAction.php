<?php

namespace App\Actions\Driver;

use App\DTOs\Driver\ReplaceDriverDocumentDTO;
use App\Services\Contracts\Driver\DriverDocumentServiceInterface;


class ReplaceDriverDocumentAction
{
    public function __construct(
        private readonly DriverDocumentServiceInterface $service
    ) {
    }

    public function execute(
        User $user,
        array $data
    ) {

        return $this->service->replaceByUser(
            $user,
            $data['document_type'],
            $data['file']
        );
    }
}
