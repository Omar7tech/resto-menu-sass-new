<?php

namespace App\Filament\Admin\Resources\Packages\Pages;

use App\Filament\Admin\Resources\Packages\PackageResource;
use Filament\Actions\CreateAction;

use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPackages extends ListRecords
{
    protected static string $resource = PackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make()->label('All packages'),
            'public' => Tab::make()->icon('heroicon-m-globe-alt')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('type', 1)),
            'custom' => Tab::make()->icon('heroicon-m-percent-badge')
                ->badgeColor('warning')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('type', 2)),
        ];
    }
}
