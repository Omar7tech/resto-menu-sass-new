<?php

namespace App\Filament\Admin\Resources\Packages\Schemas;

use App\Enums\PackageType;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Callout;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Package Details')
                    ->persistTab()
                    ->id('package-tabs')
                    ->columnSpanFull()
                    ->tabs([
                        
                        Tab::make('Basic Information')
                            ->icon(Heroicon::InformationCircle)
                            ->schema([
                                Section::make('Package Overview')
                                    ->description('Configure basic package information')
                                    ->schema([
                                        TextInput::make('name')
                                            ->required()
                                            ->maxLength(255)
                                            ->placeholder('Enter package name')
                                            ->helperText('The display name for this package'),
                                        Select::make('type')
                                            ->options(PackageType::class)
                                            ->required()
                                            ->native(false)
                                            ->helperText('Select the package type'),
                                        Textarea::make('description')
                                            ->rows(4)
                                            ->placeholder('Describe the package features and benefits...')
                                            ->helperText('Detailed description of what this package includes'),
                                    ]),
                            ]),
                        Tab::make('Pricing')
                            ->icon(Heroicon::CurrencyDollar)
                            ->schema([
                                Section::make('Pricing Configuration')
                                    ->description('Set up pricing and fees for this package')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                TextInput::make('yearly_price')
                                                    ->numeric()
                                                    ->prefix('$')
                                                    ->step(0.01)
                                                    ->required()
                                                    ->placeholder('0.00')
                                                    ->helperText('Annual subscription price'),
                                                TextInput::make('discount_yearly_price')
                                                    ->numeric()
                                                    ->prefix('$')
                                                    ->step(0.01)
                                                    ->placeholder('0.00')
                                                    ->helperText('Discounted annual price'),
                                                TextInput::make('setup_fees')
                                                    ->numeric()
                                                    ->prefix('$')
                                                    ->required()
                                                    ->step(0.01)
                                                    ->placeholder('0.00')
                                                    ->helperText('One-time setup fees'),
                                                TextInput::make('discount_setup_fees')
                                                    ->numeric()
                                                    ->prefix('$')
                                                    ->step(0.01)
                                                    ->placeholder('0.00')
                                                    ->helperText('Discounted setup fees'),
                                            ]),
                                    ]),
                            ]),

                        Tab::make('Limits & Features')
                            ->icon(Heroicon::Sparkles)
                            ->schema([
                                Section::make('Usage Limits')
                                    ->description('Configure limits for this package')
                                    ->schema([
                                        Grid::make(3)
                                            ->schema([
                                                TextInput::make('max_categories')
                                                    ->required()
                                                    ->numeric()
                                                    ->default(0)
                                                    ->minValue(0)
                                                    ->placeholder('0')
                                                    ->helperText('Maximum categories allowed'),
                                                TextInput::make('max_products')
                                                    ->required()
                                                    ->numeric()
                                                    ->default(0)
                                                    ->minValue(0)
                                                    ->placeholder('0')
                                                    ->helperText('Maximum products allowed'),
                                                TextInput::make('max_branches')
                                                    ->required()
                                                    ->numeric()
                                                    ->default(0)
                                                    ->minValue(0)
                                                    ->placeholder('0')
                                                    ->helperText('Maximum branches allowed'),
                                            ]),
                                    ]),

                                Section::make('Feature Permissions')
                                    ->description('Enable or disable features for this package')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                Toggle::make('can_add_images')
                                                    ->label('Can Add Images')
                                                    ->helperText('Allow users to upload images'),
                                                Toggle::make('can_add_tags')
                                                    ->label('Can Add Tags')
                                                    ->helperText('Allow users to add tags'),
                                                Toggle::make('has_multi_branches')
                                                    ->label('Multi-Branch Support')
                                                    ->helperText('Enable multiple branch management'),
                                                Toggle::make('can_add_to_cart')
                                                    ->label('Shopping Cart')
                                                    ->helperText('Enable shopping cart functionality'),
                                                Toggle::make('can_have_social_media')
                                                    ->label('Social Media Integration')
                                                    ->helperText('Allow social media features'),
                                                Toggle::make('can_edit_theme')
                                                    ->label('Theme Customization')
                                                    ->helperText('Allow theme editing capabilities'),
                                            ]),
                                    ]),
                            ]),

                        Tab::make('Settings')
                            ->icon(Heroicon::Cog)
                            ->schema([
                                Section::make('Package Settings')
                                    ->description('Configure package display and behavior')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                Toggle::make('is_active')
                                                    ->label('Active')
                                                    ->default(true)
                                                    ->helperText('Package is available for purchase'),
                                                Toggle::make('featured')
                                                    ->label('Featured')
                                                    ->default(false)
                                                    ->helperText('Display as featured package'),
                                                Toggle::make('remove_branding')
                                                    ->label('Remove Branding')
                                                    ->default(false)
                                                    ->helperText('Remove platform branding'),
                                            ]),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
