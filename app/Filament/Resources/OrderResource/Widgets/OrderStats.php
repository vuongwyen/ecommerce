<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Order;
use Illuminate\Support\Number;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Orders', Order::query()->where('status', 'pending')->count()),
            Stat::make('Orders Processing', Order::query()->where('status', 'processing')->count()),
            Stat::make('Orders Delivered', Order::query()->where('status', 'delivered')->count()),
            Stat::make(
                'Average Price',
                Number::currency((float) (Order::query()->avg('grand_total') ?? 0), 'VND')
            ),
        ];
    }
}
