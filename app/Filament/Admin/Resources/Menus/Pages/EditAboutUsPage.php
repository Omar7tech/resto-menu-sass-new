<?php

namespace App\Filament\Admin\Resources\Menus\Pages;

use App\Filament\Admin\Resources\Menus\MenuResource;
use BackedEnum;
use Filament\Forms\Components\RichEditor\ToolbarButtonGroup;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class EditAboutUsPage extends EditRecord
{

  protected static string $resource = MenuResource::class;
  protected static string|BackedEnum|null $navigationIcon = Heroicon::InformationCircle;
  protected static ?string $pluralModelLabel = 'About Us';
  protected static ?string $modelLabel = 'About Us';

  public static function getNavigationLabel(): string
  {
    return "About Us Page";
  }

  public function form(Schema $schema): Schema
  {
    return $schema
      ->components([
        Section::make('About Us Page Configuration')
          ->columnSpanFull()
          ->description('Configure the About Us page content and visibility')
          ->schema([
            \Filament\Forms\Components\Toggle::make('enable_aboutus')
              ->label('Enable About Us Page')
              ->helperText('Enable to show About Us page in navigation')
              ->default(false),

            \Filament\Forms\Components\RichEditor::make('aboutus_content')
              ->label('About Us Content')
              ->helperText('Enter the content for your About Us page')
              ->toolbarButtons([
                ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                [ToolbarButtonGroup::make('Paragraph', ['paragraph', 'h1', 'h2', 'h3'])->textualButtons()],
                [ToolbarButtonGroup::make('Alignment', ['alignStart', 'alignCenter', 'alignEnd', 'alignJustify'])],
                ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                ['undo', 'redo'],
              ])
              ->columnSpanFull()
              ->visibleJs(<<<'JS'
                                $get('enable_aboutus')
                            JS)
              ->requiredIf('enable_aboutus', true),
          ]),
      ]);
  }

}
