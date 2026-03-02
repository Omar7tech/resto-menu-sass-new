<?php

namespace App\Filament\Admin\Resources\Packages\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PackageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('slug'),
                TextEntry::make('type')
                    ->badge()
                    ->numeric(),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('name'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('meta')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('max_categories')
                    ->numeric(),
                TextEntry::make('max_products')
                    ->numeric(),
                IconEntry::make('can_add_images')
                    ->boolean(),
                IconEntry::make('can_add_tags')
                    ->boolean(),
                IconEntry::make('has_multi_branches')
                    ->boolean(),
                TextEntry::make('max_branches')
                    ->numeric(),
                IconEntry::make('can_add_to_cart')
                    ->boolean(),
                IconEntry::make('can_have_social_media')
                    ->boolean(),
                IconEntry::make('can_edit_theme')
                    ->boolean(),
                IconEntry::make('remove_branding')
                    ->boolean(),
                IconEntry::make('featured')
                    ->boolean(),
                TextEntry::make('yearly_price')
                    ->money()
                    ->placeholder('-'),
                TextEntry::make('discount_yearly_price')
                    ->money()
                    ->placeholder('-'),
                TextEntry::make('sort')
                    ->numeric(),
                TextEntry::make('setup_fees')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('discount_setup_fees')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
