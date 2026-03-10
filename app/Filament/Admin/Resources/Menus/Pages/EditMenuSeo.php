<?php

namespace App\Filament\Admin\Resources\Menus\Pages;

use App\Filament\Admin\Resources\Menus\MenuResource;
use App\Helpers\UrlHelper;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Components\Html;
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
                    ->footer('OG images are automatically generated from the logo if not provided')
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
                        Section::make('OG Image')
                            ->description('Configure the image that appears when sharing your menu on social media')
                            ->schema([
                                Toggle::make('is_og_image_external')
                                    ->label('Use external OG image URL')
                                    ->live()
                                    ->helperText('Toggle to choose between uploading an image or using an external URL')
                                    ->default(false),
                                TextInput::make('og_image_external_link')
                                    ->label('OG Image External Link')
                                    ->helperText('External image URL for social media sharing. Recommended size: 1200x630px.')
                                    ->live()
                                    ->url()
                                    ->required(fn(callable $get) => $get('is_og_image_external'))
                                    ->rules([
                                        'nullable',
                                        function () {
                                            return function (string $attribute, $value, \Closure $fail) {
                                                if ($value && !UrlHelper::isValidImageUrl($value)) {
                                                    $fail('The URL must be a valid image URL (jpg, jpeg, png, gif, svg, webp, ico, bmp).');
                                                }
                                            };
                                        }
                                    ])
                                    ->visible(fn(callable $get) => $get('is_og_image_external')),
                                SpatieMediaLibraryFileUpload::make('og_image')
                                    ->label('OG Image Upload')
                                    ->helperText('Upload an image for social media sharing. Recommended size: 1200x630px.')
                                    ->image()
                                    ->live()
                                    ->downloadable()
                                    ->openable()
                                    ->collection(collection: 'og_image')
                                    ->disk('public')
                                    ->conversion('og_image')
                                    ->visibility('public')
                                    ->visible(fn(callable $get) => !$get('is_og_image_external')),

                            ]),
                    ]),

                Section::make('Favicon')
                    ->footer('Favicon is automatically generated from the logo if not provided')
                    ->columnSpanFull()
                    ->description('Website favicon settings')
                    ->schema([
                        Toggle::make('is_favicon_image_external')
                            ->label('Use external favicon URL')
                            ->live()
                            ->helperText('Toggle to choose between uploading a favicon or using an external URL')
                            ->default(false),
                        TextInput::make('favicon_external_link')
                            ->label('Favicon URL')
                            ->helperText('External favicon URL')
                            ->live()
                            ->url()
                            ->required(fn(callable $get) => $get('is_favicon_image_external'))
                            ->rules([
                                'nullable',
                                function () {
                                    return function (string $attribute, $value, \Closure $fail) {
                                        if ($value && !UrlHelper::isValidFaviconUrl($value)) {
                                            $fail('The URL must be a valid favicon URL (ico, png, svg).');
                                        }
                                    };
                                }
                            ])
                            ->visible(fn(callable $get) => $get('is_favicon_image_external')),
                        SpatieMediaLibraryFileUpload::make('favicon_upload')
                            ->label('Favicon Upload')
                            ->collection('favicon')
                            ->helperText('Upload a favicon file (ICO, PNG, or SVG)')
                            ->acceptedFileTypes(['image/x-icon', 'image/png', 'image/svg+xml'])
                            ->visibility('public')
                            ->openable()
                            ->downloadable()
                            ->conversion('favicon')
                            ->disk('public')
                            ->live()

                            ->visible(fn(callable $get) => !$get('is_favicon_image_external')),
                        Section::make()
                            ->description('This will use an external image URL for the favicon. Make sure the URL is publicly accessible and points to a valid favicon file (ICO, PNG, or SVG).')
                            ->icon('heroicon-o-information-circle')
                            ->iconColor('info')
                            ->visible(fn(callable $get) => $get('is_favicon_image_external')),
                    ]),
            ]);
    }

}
