<?php

namespace App\Enums\Driver;

enum DriverVehicleDocumentType: string
{
    case RC = 'rc';

    case INSURANCE = 'insurance';

    case FITNESS = 'fitness';

    case POLLUTION = 'pollution';

    case PERMIT = 'permit';

    case VEHICLE_PHOTO = 'vehicle_photo';
}
