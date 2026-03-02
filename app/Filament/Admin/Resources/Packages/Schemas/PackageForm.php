<?php

namespace App\Filament\Admin\Resources\Packages\Schemas;

use App\Enums\PackageType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->required(),
                Select::make('type')
                    ->options(PackageType::class)
                    ->default(2)
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Textarea::make('meta')
                    ->columnSpanFull(),
                TextInput::make('max_categories')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('max_products')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('can_add_images')
                    ->required(),
                Toggle::make('can_add_tags')
                    ->required(),
                Toggle::make('has_multi_branches')
                    ->required(),
                TextInput::make('max_branches')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('can_add_to_cart')
                    ->required(),
                Toggle::make('can_have_social_media')
                    ->required(),
                Toggle::make('can_edit_theme')
                    ->required(),
                Toggle::make('remove_branding')
                    ->required(),
                Toggle::make('featured')
                    ->required(),
                TextInput::make('yearly_price')
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('discount_yearly_price')
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('sort')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('setup_fees')
                    ->numeric(),
                TextInput::make('discount_setup_fees')
                    ->numeric(),
            ]);
    }
}
