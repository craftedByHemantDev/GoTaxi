<?php

namespace App\Actions\Admin;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Services\Contracts\Driver\DriverDocumentServiceInterface;

class ListPendingDriverDocumentsAction
{
    public function __construct(
        private readonly DriverDocumentServiceInterface $service
    ) {
    }

    public function execute(): LengthAwarePaginator
    {
        return $this->service->pending();
    }
}
