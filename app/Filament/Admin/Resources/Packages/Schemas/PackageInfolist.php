<?php

namespace App\Filament\Admin\Resources\Packages\Schemas;

use App\Enums\PackageType;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Support\Icons\Heroicon;

class PackageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Package Details')->columnSpanFull()
                    ->persistTab()
                    ->id('package-infolist-tabs')
                    ->tabs([
                        Tab::make('Basic Information')
                            ->icon(Heroicon::InformationCircle)
                            ->schema([
                                Section::make('Package Overview')
                                    ->description('Basic package information')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                TextEntry::make('name')
                                                    ->label('Package Name')
                                                    ->weight('bold')
                                                    ->size('lg'),
                                                TextEntry::make('slug')
                                                    ->label('Slug')
                                                    ->copyable()
                                                    ->copyMessage('Slug copied to clipboard'),
                                            ]),
                                        TextEntry::make('type')
                                            ->label('Package Type')
                                            ->badge()
                                            ->formatStateUsing(fn(PackageType $state): string => $state->getLabel())
                                            ->color(fn(PackageType $state): string => $state->getColor()),
                                        TextEntry::make('description')
                                            ->label('Description')
                                            ->placeholder('No description provided')
                                            ->columnSpanFull()
                                            ->markdown(),
                                    ]),
                            ]),

                        Tab::make('Pricing')
                            ->icon(Heroicon::CurrencyDollar)
                            ->schema([
                                Section::make('Pricing Information')
                                    ->description('Package pricing details')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                TextEntry::make('yearly_price')
                                                    ->label('Yearly Price')
                                                    ->money('USD')
                                                    ->weight('bold'),
                                                TextEntry::make('discount_yearly_price')
                                                    ->label('Discounted Yearly Price')
                                                    ->money('USD')
                                                    ->placeholder('No discount'),
                                                TextEntry::make('setup_fees')
                                                    ->label('Setup Fees')
                                                    ->money('USD')
                                                    ->weight('bold'),
                                                TextEntry::make('discount_setup_fees')
                                                    ->label('Discounted Setup Fees')
                                                    ->money('USD')
                                                    ->placeholder('No discount'),
                                            ]),
                                    ]),
                            ]),

                        Tab::make('Limits & Features')
                            ->icon(Heroicon::Sparkles)
                            ->schema([
                                Section::make('Usage Limits')
                                    ->description('Package usage limitations')
                                    ->schema([
                                        Grid::make(3)
                                            ->schema([
                                                TextEntry::make('max_categories')
                                                    ->label('Max Categories')
                                                    ->numeric()
                                                    ->formatStateUsing(fn($state) => $state === 0 ? 'Unlimited' : $state),
                                                TextEntry::make('max_products')
                                                    ->label('Max Products')
                                                    ->numeric()
                                                    ->formatStateUsing(fn($state) => $state === 0 ? 'Unlimited' : $state),
                                                TextEntry::make('max_branches')
                                                    ->label('Max Branches')
                                                    ->numeric()
                                                    ->formatStateUsing(fn($state) => $state === 0 ? 'Unlimited' : $state),
                                            ]),
                                    ]),

                                Section::make('Feature Permissions')
                                    ->description('Enabled features for this package')
                                    ->schema([
                                        Grid::make(3)
                                            ->schema([
                                                IconEntry::make('can_add_images')
                                                    ->label('Images')
                                                    ->boolean(),
                                                IconEntry::make('can_add_tags')
                                                    ->label('Tags')
                                                    ->boolean(),
                                                IconEntry::make('has_multi_branches')
                                                    ->label('Multi-Branch')
                                                    ->boolean(),
                                                IconEntry::make('can_add_to_cart')
                                                    ->label('Shopping Cart')
                                                    ->boolean(),
                                                IconEntry::make('can_have_social_media')
                                                    ->label('Social Media')
                                                    ->boolean(),
                                                IconEntry::make('can_edit_theme')
                                                    ->label('Theme Editor')
                                                    ->boolean(),
                                            ]),
                                    ]),
                            ]),

                        Tab::make('Settings')
                            ->icon(Heroicon::Cog)
                            ->schema([
                                Section::make('Package Settings')
                                    ->description('Package configuration and status')
                                    ->schema([
                                        Grid::make(3)
                                            ->schema([
                                                IconEntry::make('is_active')
                                                    ->label('Active Status')
                                                    ->boolean(),
                                                IconEntry::make('featured')
                                                    ->label('Featured')
                                                    ->boolean(),
                                                IconEntry::make('remove_branding')
                                                    ->label('No Branding')
                                                    ->boolean(),
                                            ]),
                                        TextEntry::make('sort')
                                            ->label('Display Order')
                                            ->numeric()
                                            ->helperText('Lower numbers appear first'),
                                    ]),

                                Section::make('Meta Information')
                                    ->description('Additional metadata')
                                    ->collapsible()
                                    ->collapsed()
                                    ->schema([
                                        TextEntry::make('meta')
                                            ->label('Meta Fields')
                                            ->placeholder('No meta fields configured')
                                            ->columnSpanFull()
                                            ->formatStateUsing(function ($state) {
                                                if (empty($state)) {
                                                    return 'No meta fields configured';
                                                }

                                                $output = '';
                                                foreach ($state as $key => $value) {
                                                    $output .= "**{$key}:** {$value}\n";
                                                }
                                                return $output;
                                            })
                                            ->markdown(),
                                    ]),
                            ]),

                        Tab::make('System Information')
                            ->icon(Heroicon::Server)
                            ->schema([
                                Section::make('Timestamps')
                                    ->description('System timestamps')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                TextEntry::make('created_at')
                                                    ->label('Created On')
                                                    ->dateTime(),
                                                TextEntry::make('updated_at')
                                                    ->label('Last Updated')
                                                    ->dateTime(),
                                            ]),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
