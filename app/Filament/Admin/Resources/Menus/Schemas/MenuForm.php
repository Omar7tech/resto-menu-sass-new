<?php

namespace App\Filament\Admin\Resources\Menus\Schemas;

use App\Enums\UserRole;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('description'),
                TextInput::make('slug')
                    ->required(),
                Select::make('user_id')
                    ->required()
                    ->searchable()
                    ->relationship(name: 'user', titleAttribute: 'name', modifyQueryUsing: fn($query) => $query->where('role', '!=', UserRole::ADMIN->value))
            ]);
    }
}
