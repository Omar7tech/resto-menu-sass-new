<?php

namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Support\Contracts\HasColor;
enum UserRole: int implements HasLabel , HasColor
{
    case ADMIN = 1;
    case CLIENT = 2;
    case GUEST = 3;
    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::CLIENT => 'Client',
            self::GUEST => 'Guest',
        };
    }

    public function isAdmin(): bool
    {
        return $this === self::ADMIN;
    }

     public function getLabel(): string | Htmlable | null
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::CLIENT => 'Client',
            self::GUEST => 'Guest',
        };
    }

     public function getColor(): string | array | null
    {
        return match ($this) {
            self::ADMIN => 'danger',
            self::CLIENT => 'success',
            self::GUEST => 'warning',
        };
    }
}