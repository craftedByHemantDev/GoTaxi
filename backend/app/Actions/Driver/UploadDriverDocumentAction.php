<?php

namespace App\Actions\Driver;

use App\Models\User;
use App\Services\Contracts\Driver\DriverDocumentServiceInterface;

class UploadDriverDocumentAction
{
    public function __construct(
        private readonly DriverDocumentServiceInterface $service
    ) {
    }

    public function execute(
        User $user,
        array $data
    ) {

        $driver = $user->driver;

        return $this->service->upload(

            $driver,

            $data['document_type'],

            $data['file']

        );
    }
}
