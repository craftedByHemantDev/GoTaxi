<?php

namespace App\Enums\Driver;

enum DocumentStatus: string
{
    case PENDING = 'pending';

    case APPROVED = 'approved';

    case REJECTED = 'rejected';
}
