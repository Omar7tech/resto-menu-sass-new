<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DataCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Packages Count', '192.1k')
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Bounce rate', '21%')
                ->description('7% decrease')
                ->descriptionIcon('heroicon-m-arrow-trending-down'),
        ];
    }

    protected function getHeading(): ?string
    {
        return 'Analytics';
    }
}
