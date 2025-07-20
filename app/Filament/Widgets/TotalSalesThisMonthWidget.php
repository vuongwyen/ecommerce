<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Order;
use Illuminate\Support\Number;
use Carbon\Carbon;

class TotalSalesThisMonthWidget extends BaseWidget
{
    protected ?string $heading = 'Total Sales This Month';

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $currentMonth = Carbon::now()->startOfMonth();
        $nextMonth = Carbon::now()->addMonth()->startOfMonth();

        $totalSales = Order::query()
            ->where('status', 'delivered')
            ->whereBetween('created_at', [$currentMonth, $nextMonth])
            ->sum('grand_total');

        return [
            Stat::make('Total Sales This Month', Number::currency($totalSales, 'VND'))
                ->description('Sum of all completed orders')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('success')
                ->icon('heroicon-o-shopping-cart'),
        ];
    }
}
