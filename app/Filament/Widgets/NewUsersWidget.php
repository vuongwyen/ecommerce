<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use Carbon\Carbon;

class NewUsersWidget extends BaseWidget
{
    protected ?string $heading = 'New Users This Month';

    protected static ?int $sort = 3;

    protected function getStats(): array
    {
        $currentMonth = Carbon::now()->startOfMonth();
        $nextMonth = Carbon::now()->addMonth()->startOfMonth();

        $newUsersCount = User::query()
            ->whereBetween('created_at', [$currentMonth, $nextMonth])
            ->count();

        return [
            Stat::make('New Users This Month', $newUsersCount)
                ->description('Users registered this month')
                ->descriptionIcon('heroicon-m-user-plus')
                ->color('info')
                ->icon('heroicon-o-users'),
        ];
    }
}
