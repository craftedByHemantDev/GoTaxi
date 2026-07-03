<?php

namespace App\Enums\User;

enum UserRole: string
{
    case CUSTOMER = 'customer';
    case DRIVER = 'driver';
    case ADMIN = 'admin';
    case SUPER_ADMIN = 'super_admin';
}
