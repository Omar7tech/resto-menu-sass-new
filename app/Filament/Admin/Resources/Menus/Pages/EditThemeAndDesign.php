<?php

namespace App\Filament\Admin\Resources\Menus\Pages;

use App\Filament\Admin\Resources\Menus\MenuResource;
use App\Helpers\UrlHelper;
use BackedEnum;
use CharlieEtienne\FilamentFontPicker\FontPicker;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Alkoumi\FilamentImageRadioButton\Forms\Components\ImageRadioGroup;
use Filament\Forms\Components\Radio;
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
                    
                    Toggle::make('show_logo_in_hero')
                      ->label('Show Logo In Hero')
                      ->helperText('Display logo in hero section when Use Text Logo is disabled')
                      ->default(false)
                      ->visibleJs(<<<'JS'
                        !$get('is_logo_typography')
                        JS),
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
                
                Section::make('Background Image')
                  ->description('Configure custom background image')
                  ->schema([
                    Toggle::make('has_custom_background')
                      ->label('Enable Custom Background')
                      ->helperText('Enable to use custom background image')
                      ->default(false)
                      ->live(),
                    
                    Radio::make('background_source')
                      ->label('Background Source')
                      ->options([
                        'upload' => 'Upload Image',
                        'external' => 'External URL',
                      ])
                      ->default('upload')
                      ->visibleJs(<<<'JS'
                        $get('has_custom_background')
                        JS)
                      ->live(),
                    
                    SpatieMediaLibraryFileUpload::make('background_image')
                      ->label('Background Image')
                      ->helperText('Upload background image')
                      ->collection('background')
                      ->disk('public')
                      ->visibility('public')
                      ->image()
                      ->imageEditor()
                      ->visibleJs(<<<'JS'
                        $get('has_custom_background') && $get('background_source') === 'upload'
                        JS)
                      ->downloadable()
                      ->openable(),
                    
                    TextInput::make('background_image_url')
                      ->label('Background Image URL')
                      ->helperText('Enter external image URL')
                      ->url()
                      ->visibleJs(<<<'JS'
                        $get('has_custom_background') && $get('background_source') === 'external'
                        JS),
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
                    
                    ImageRadioGroup::make('is_category_badge_rounded_full')
                      ->label('Category Badge Style')
                      ->helperText('Choose the badge style')
                      ->disk('public')
                      ->options([
                        false => 'images/category-bar/normal.jpg',
                        true => 'images/category-bar/rounded.jpg',
                      ])
                      ->gridColumns(2)
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

            Tab::make('Category Titles')
              ->icon(Heroicon::DocumentText)
              ->schema([
                Section::make('Category Title Design')
                  ->description('Configure how category titles are displayed')
                  ->schema([
                    Toggle::make('is_category_title_bold')
                      ->label('Bold Category Titles')
                      ->helperText('Enable to make category titles bold')
                      ->default(true),
                    
                    Toggle::make('is_category_title_centered')
                      ->label('Centered Category Titles')
                      ->helperText('Enable to center-align category titles')
                      ->default(false),
                    
                    Toggle::make('is_category_title_custom_font')
                      ->label('Category Titles Follow Custom Font')
                      ->helperText('Enable for titles to use custom font, disable to always use Poppins')
                      ->default(true),
                  ]),
                
                Section::make('Category Title Effects')
                  ->description('Configure special effects for category titles')
                  ->schema([
                    Toggle::make('show_category_index')
                      ->label('Show Category Index Numbers')
                      ->helperText('Enable to show index numbers (01, 02, 03...) next to category titles')
                      ->default(false),
                    
                    Toggle::make('capitalize_category_names')
                      ->label('Capitalize Category Names')
                      ->helperText('Enable to display category names in uppercase')
                      ->default(false),
                  ]),
                
                Section::make('Category Title Color')
                  ->description('Configure custom color for category titles')
                  ->schema([
                    Toggle::make('category_title_custom_color')
                      ->label('Use Custom Title Color')
                      ->helperText('Enable to use custom color for category titles instead of theme colors')
                      ->default(false)
                      ->live(),
                    
                    ColorPicker::make('category_title_color')
                      ->label('Title Color')
                      ->helperText('Choose custom color for category titles')
                      ->hex()
                      ->default('#8B5CF6')
                      ->visibleJs(<<<'JS'
                        $get('category_title_custom_color')
                        JS),
                  ]),
                
                Section::make('Category Descriptions')
                  ->description('Configure category description display')
                  ->schema([
                    Toggle::make('show_category_descriptions')
                      ->label('Show Category Descriptions')
                      ->helperText('Enable to display category descriptions below category titles')
                      ->default(false),
                  ]),
              ]),

            Tab::make('Category Animations')
              ->icon(Heroicon::Sparkles)
              ->schema([
                Section::make('Animation Settings')
                  ->description('Configure animation effects for category sections')
                  ->schema([
                    Toggle::make('enable_category_animations')
                      ->label('Enable Category Animations')
                      ->helperText('Enable to apply animation effects when categories come into view')
                      ->default(true)
                      ->live(),
                    
                    \Filament\Forms\Components\Select::make('category_animation_type')
                      ->label('Animation Type')
                      ->helperText('Choose the animation effect for category sections')
                      ->native(false)
                      ->default('fade-up')
                      ->requiredIf('enable_category_animations', true)
                      ->options([
                        'fade-up' => 'Fade Up',
                        'fade-down' => 'Fade Down',
                        'fade-left' => 'Fade Left',
                        'fade-right' => 'Fade Right',
                        'fade-up-left' => 'Fade Up Left',
                        'fade-up-right' => 'Fade Up Right',
                        'fade-down-left' => 'Fade Down Left',
                        'fade-down-right' => 'Fade Down Right',
                        'zoom-in' => 'Zoom In',
                        'zoom-out' => 'Zoom Out',
                        'slide-up' => 'Slide Up',
                        'slide-down' => 'Slide Down',
                        'slide-left' => 'Slide Left',
                        'slide-right' => 'Slide Right',
                        'flip-left' => 'Flip Left',
                        'flip-right' => 'Flip Right',
                        'flip-up' => 'Flip Up',
                        'flip-down' => 'Flip Down',
                      ])
                      ->default('fade-up')
                      ->visibleJs(<<<'JS'
                        $get('enable_category_animations')
                        JS),
                  ]),
              ]),
          ]),
      ]);
  }

}
