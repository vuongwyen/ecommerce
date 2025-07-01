<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;


class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Resources\OrderResource\Widgets\OrderStats::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('Tất cả'),
            'pending' => Tab::make('Chờ xử lý')->query(fn($query) => $query->where('status', 'pending')),
            'processing' => Tab::make('Đang xử lý')->query(fn($query) => $query->where('status', 'processing')),
            'shipped' => Tab::make('Đã giao cho đơn vị vận chuyển')->query(fn($query) => $query->where('status', 'shipped')),
            'delivered' => Tab::make('Đã giao')->query(fn($query) => $query->where('status', 'delivered')),
            'cancelled' => Tab::make('Đã hủy')->query(fn($query) => $query->where('status', 'cancelled'))
        ];
    }
}
