<?php

namespace App\Enums\Auth;

enum OtpPurpose: string
{
    case LOGIN = 'login';
    case REGISTER = 'register';
    case RESET_PASSWORD = 'reset_password';
}
