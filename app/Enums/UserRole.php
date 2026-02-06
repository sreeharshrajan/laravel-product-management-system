<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case USERS = 'users';

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::USERS => 'Standard User',
        };
    }
}
