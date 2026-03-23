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

class ManageSocialSettings extends EditRecord
{

    protected static string $resource = MenuResource::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ChatBubbleLeftRight;
    protected static ?string $pluralModelLabel = 'Social Settings';
    protected static ?string $modelLabel = 'Social Settings';

    public static function getNavigationLabel(): string
    {
        return "Social Settings";
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([]);
    }

}
