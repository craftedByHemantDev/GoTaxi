<?php

namespace App\Enums\Auth;

enum OtpPurpose: string
{
    case LOGIN = 'login';

    case REGISTER = 'register';

    case DRIVER_APPLICATION = 'driver_application';

    case CHANGE_MOBILE = 'change_mobile';

    case DELETE_ACCOUNT = 'delete_account';
}
