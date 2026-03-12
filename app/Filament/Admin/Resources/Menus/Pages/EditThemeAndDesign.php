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
        Section::make('Brand Identity')
          ->schema([
            SpatieMediaLibraryFileUpload::make('logo')
              ->label('Logo')
              ->helperText('Upload your restaurant logo. Recommended size: 200x60px. Supports transparent PNG.')
              ->image()
              ->live()
              ->downloadable()
              ->openable()
              ->collection('logo')
              ->disk('public')
              ->conversion('logo')
              ->visibility('public'),
            TextInput::make('name')
              ->label('Restaurant Name')
              ->helperText('This will be displayed in the navbar if no logo is uploaded')
              ->required(),
          ])
          ->columns(2),

        Section::make('Theme Settings')
          ->schema([
            ColorPicker::make('primary_color')
              ->label('Primary Color')
              ->hex(),
            Toggle::make('dark_mode')
              ->label('Dark Mode')
              ->helperText('Enable dark mode for this menu')
              ->default(false),

            FontPicker::make('font')
              ->label('Choose Font')
          ])
      ]);
  }

}
