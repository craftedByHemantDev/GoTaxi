<?php

namespace App\Enums\Driver;

enum DocumentType: string
{
    public static function values(): array
{
    return array_column(
        self::cases(),
        'value'
    );
}
    case DRIVING_LICENSE = 'driving_license';

    case VEHICLE_RC = 'vehicle_rc';

    case VEHICLE_INSURANCE = 'vehicle_insurance';

    case POLLUTION_CERTIFICATE = 'pollution_certificate';

    case FITNESS_CERTIFICATE = 'fitness_certificate';

    case VEHICLE_PERMIT = 'vehicle_permit';

    case AADHAAR_CARD = 'aadhaar_card';

    case PAN_CARD = 'pan_card';

    case PROFILE_PHOTO = 'profile_photo';

    case VEHICLE_PHOTO = 'vehicle_photo';
}
