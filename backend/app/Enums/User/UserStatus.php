<?php

namespace App\Enums\User;

enum UserStatus: string
{
    case PENDING = 'pending';
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case SUSPENDED = 'suspended';
    case BLOCKED = 'blocked';
    case DELETED = 'deleted';
}
