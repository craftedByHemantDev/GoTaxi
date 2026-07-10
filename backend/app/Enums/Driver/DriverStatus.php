<?php

namespace App\Enums\Driver;

enum DriverStatus: string
{
    case PENDING = 'pending';

    case APPROVED = 'approved';

    case REJECTED = 'rejected';

    case SUSPENDED = 'suspended';
}
