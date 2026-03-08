<?php

namespace App\Filament\Admin\Resources\Menus\Pages;

use App\Filament\Admin\Resources\Menus\MenuResource;
use BackedEnum;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class EditMenuSeo extends EditRecord
{

    protected static string $resource = MenuResource::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArrowTrendingUp;
    protected static ?string $pluralModelLabel = 'SEO';
    protected static ?string $modelLabel = 'SEO';

    public static function getNavigationLabel(): string
    {
        return "SEO";
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic SEO')
                    ->columnSpanFull()
                    ->description('Essential SEO settings for search engines')
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->helperText('Title that appears in search results (recommended: 50-60 characters)')
                            ->maxLength(60),

                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->helperText('Description that appears in search results (recommended: 150-160 characters)')
                            ->rows(3)
                            ->maxLength(160),

                        Repeater::make('meta_keywords')
                            ->compact()
                            ->maxItems(12)
                            ->simple(TextInput::make('keyword')->maxLength(20)->required())
                            ->addable(true)
                    ]),

                Section::make('Open Graph')
                    ->columnSpanFull()
                    ->description('Social media sharing settings')
                    ->schema([
                        TextInput::make('og_title')
                            ->label('OG Title')
                            ->helperText('Title when shared on social media (defaults to meta title if empty)'),
                        Textarea::make('og_description')
                            ->label('OG Description')
                            ->helperText('Description when shared on social media (defaults to meta description if empty)')
                            ->rows(3),
                        TextInput::make('og_image')
                            ->label('OG Image')
                            ->helperText('Image URL when shared on social media')
                            ->url(),
                    ]),
            ]);
    }

}
