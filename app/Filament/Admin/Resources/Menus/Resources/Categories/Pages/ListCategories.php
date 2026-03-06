<?php

namespace App\Filament\Admin\Resources\Menus\Pages;

use App\Filament\Admin\Resources\Menus\Resources\Categories\CategoryResource;
use BackedEnum;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Icons\Heroicon;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
