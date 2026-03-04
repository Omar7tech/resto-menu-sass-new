<?php

namespace App\Filament\Admin\Resources\Users\Pages;

use App\Filament\Admin\Resources\Users\UserResource;
use App\Models\User;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\EmbeddedTable;
use Filament\Schemas\Components\RenderHook;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\View\PanelsRenderHook;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make()->icon('heroicon-m-user-group'),
            'clients' => Tab::make()->icon('heroicon-m-user-circle')
                ->badge(static fn(): int => User::query()->where('role', 2)->count())
                ->deferBadge()
                ->badgeColor('success')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('role', 2)),
            'guests' => Tab::make()->icon('heroicon-m-user')
                ->badge(static fn(): int => User::query()->where('role', 3)->count())
                ->deferBadge()
                ->badgeColor('warning')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('role', 3)),
        ];
    }

    public function getDefaultActiveTab(): string|int|null
    {
        return 'clients';
    }

    
}

