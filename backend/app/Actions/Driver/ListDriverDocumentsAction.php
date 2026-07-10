<?php

namespace App\Actions\Driver;

use App\Models\User;
use Illuminate\Support\Collection;
use App\Services\Contracts\Driver\DriverDocumentServiceInterface;

class ListDriverDocumentsAction
{
    public function __construct(
        private readonly DriverDocumentServiceInterface $service
    ) {
    }

    public function execute(
        User $user
    ): Collection {

        return $this->service->list(
            $user->driver
        );
    }
}
