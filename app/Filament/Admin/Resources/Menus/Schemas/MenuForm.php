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
                    ->columnSpanFull()
                    ->required()
                    ->helperText(fn (string $operation): ?string => $operation === 'edit' ? "⚠️ Editing the name will change the slug URL and regenerate the barcode" : "💡 Choose a permanent name to avoid future URL and barcode changes"),
                TextInput::make('description'),
                Select::make('user_id')
                    ->required()
                    ->searchable()
                    ->helperText("👤 Assign this menu to a user. Note: If you edit this user later, the menu will no longer be visible to them")
                    ->relationship(name: 'user', titleAttribute: 'name', modifyQueryUsing: fn($query) => $query->where('role', '!=', UserRole::ADMIN->value)),
                Select::make('package_id')
                    ->required()
                    ->native(false)
                    ->helperText("📦 Select the subscription package that determines available features and limits for this menu")
                    ->relationship(name: 'package', titleAttribute: 'name'),
            ]);
    }
}
