<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Support\Contracts\HasColor;

enum PackageType: int implements HasLabel, HasColor
{
    case PUBLIC = 1;
    case CUSTOM = 2;
    public function label(): string
    {
        return match ($this) {
            self::PUBLIC => 'Public',
            self::CUSTOM => 'Custom',
        };
    }

    public function getLabel(): string | Htmlable | null
    {
        return match ($this) {
            self::PUBLIC => 'Public',
            self::CUSTOM => 'Custom',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::PUBLIC => 'success',
            self::CUSTOM => 'warning',
        };
    }
}
