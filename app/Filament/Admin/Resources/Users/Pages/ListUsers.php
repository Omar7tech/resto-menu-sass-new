<?php

namespace App\Filament\Admin\Resources\Users\Pages;

use App\Filament\Admin\Resources\Users\UserResource;
use App\Models\User;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
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
                ->badge(User::query()->where('role', 2)->count())
                ->badgeColor('success')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('role', 2)),
            'guests' => Tab::make()->icon('heroicon-m-user')
                ->badge(User::query()->where('role', 3)->count())
                ->badgeColor('warning')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('role', 3)),
        ];
    }
}
