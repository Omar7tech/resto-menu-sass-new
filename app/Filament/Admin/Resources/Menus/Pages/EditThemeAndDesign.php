<?php

namespace App\Filament\Admin\Resources\Menus\Pages;

use App\Filament\Admin\Resources\Menus\MenuResource;
use App\Helpers\UrlHelper;
use BackedEnum;
use CharlieEtienne\FilamentFontPicker\FontPicker;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Components\Html;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class EditThemeAndDesign extends EditRecord
{

  protected static string $resource = MenuResource::class;
  protected static string|BackedEnum|null $navigationIcon = Heroicon::Swatch;
  protected static ?string $pluralModelLabel = 'Theme & Design';
  protected static ?string $modelLabel = 'Theme & Design';

  public static function getNavigationLabel(): string
  {
    return "Theme & Design";
  }

  public function form(Schema $schema): Schema
  {
    return $schema
      ->components([
        Tabs::make('Theme & Design Settings')
          ->persistTab()
          ->id('theme-tabs')
          ->columnSpanFull()
          ->tabs([
            
            Tab::make('Brand Identity')
              ->icon(Heroicon::BuildingOffice)
              ->schema([
                Section::make('Logo Configuration')
                  ->description('Configure your menu logo and branding')
                  ->schema([
                    Toggle::make('is_logo_typography')
                      ->label('Use Text Logo')
                      ->helperText('Enable to use text-based logo, disable to upload custom logo image')
                      ->default(true)
                      ->live(),
                    
                    Toggle::make('typography_logo_follow_primary_color')
                      ->label('Typography Logo Follow Primary Color')
                      ->helperText('Enable for text logo to use primary color, disable for normal text color')
                      ->default(true)
                      ->visibleJs(<<<'JS'
                        $get('is_logo_typography')
                        JS),
                    
                    SpatieMediaLibraryFileUpload::make('logo')
                      ->label('Logo Image')
                      ->helperText('Upload custom logo image when text logo is disabled')
                      ->collection('logo')
                      ->disk('public')
                      ->visibility('public')
                      ->image()
                      ->imageEditor()
                      ->visibleJs(<<<'JS'
                        !$get('is_logo_typography')
                        JS)
                      ->downloadable()
                      ->openable()
                      ->conversion('logo'),
                  ]),
              ]),

            Tab::make('Colors & Theme')
              ->icon(Heroicon::Swatch)
              ->schema([
                Section::make('Theme Configuration')
                  ->description('Configure colors and theme settings')
                  ->schema([
                    ColorPicker::make('primary_color')
                      ->label('Primary Color')
                      ->helperText('Main color for your menu theme')
                      ->hex(),
                    Toggle::make('dark_mode')
                      ->label('Dark Mode')
                      ->helperText('Enable dark mode for this menu')
                      ->default(false),
                  ]),
              ]),

            Tab::make('Typography')
              ->icon(Heroicon::Language)
              ->schema([
                Section::make('Font Settings')
                  ->description('Configure typography and fonts')
                  ->schema([
                    Toggle::make('have_customized_font')
                      ->label('Use Custom Font')
                      ->helperText('Enable to choose a custom font for this menu')
                      ->default(false)
                      ->live(),
                    
                    FontPicker::make('font')
                      ->label('Choose Font')
                      ->helperText('Select a custom font for your menu')
                      ->visibleJs(<<<'JS'
                        $get('have_customized_font')
                        JS),
                  ]),
              ]),

            Tab::make('Category Bar')
              ->icon(Heroicon::Tag)
              ->schema([
                Section::make('Category Badge Appearance')
                  ->description('Configure how category badges look and behave')
                  ->schema([
                    Toggle::make('uppercase_all_category_badges')
                      ->label('Uppercase All Category Badges')
                      ->helperText('Enable to uppercase all category badge text using Tailwind classes')
                      ->default(false),
                    
                    Toggle::make('category_badge_show_border')
                      ->label('Show Category Badge Borders')
                      ->helperText('Enable to show borders around category badges for better definition')
                      ->default(true),
                    
                    Toggle::make('is_category_badge_rounded_full')
                      ->label('Full Rounded Category Badges')
                      ->helperText('Enable for fully rounded badges, disable for slightly rounded badges')
                      ->default(true),
                  ]),
                
                Section::make('Category Badge Behavior')
                  ->description('Configure category badge functionality')
                  ->schema([
                    Toggle::make('is_category_bar_sticky')
                      ->label('Sticky Category Bar')
                      ->helperText('Enable to keep category bar visible while scrolling')
                      ->default(false),
                    
                    Toggle::make('is_category_badge_follow_font')
                      ->label('Category Badges Follow Custom Font')
                      ->helperText('Enable for badges to use custom font, disable to always use Poppins')
                      ->default(true),
                    
                    Toggle::make('is_category_badge_follow_primary_color')
                      ->label('Category Badges Follow Primary Color')
                      ->helperText('Enable for badges to use primary color, disable to choose custom badge color')
                      ->default(true)
                      ->live(),
                    
                    ColorPicker::make('category_badge_color')
                      ->label('Category Badge Color')
                      ->helperText('Choose custom color for category badges when primary color is disabled')
                      ->hex()
                      ->visibleJs(<<<'JS'
                        !$get('is_category_badge_follow_primary_color')
                        JS),
                  ]),
              ]),
          ]),
      ]);
  }

}
