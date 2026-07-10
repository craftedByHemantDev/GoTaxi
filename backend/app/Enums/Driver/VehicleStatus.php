<?php

namespace App\Enums\Driver;

enum VehicleStatus:string
{
    case PENDING='pending';

    case APPROVED='approved';

    case REJECTED='rejected';
}
