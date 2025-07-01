<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Filament\Resources\OrderResource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use App\Models\Order;

class LatestOrders extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Đơn hàng mới nhất';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(OrderResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('Mã đơn hàng')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Khách hàng')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('grand_total')
                    ->label('Tổng tiền')
                    ->money('VND', true)
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Trạng thái')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'primary',
                        'delivered' => 'success',
                        'cancelled' => 'danger',
                        'pending' => 'secondary',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'pending' => 'heroicon-o-clock',
                        'processing' => 'heroicon-o-cog',
                        'delivered' => 'heroicon-o-check-circle',
                        'cancelled' => 'heroicon-o-x-circle',
                        'pending' => 'heroicon-o-question-mark-circle',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'pending' => 'Chờ xử lý',
                        'processing' => 'Đang xử lý',
                        'shipped' => 'Đã giao cho đơn vị vận chuyển',
                        'delivered' => 'Đã giao',
                        'cancelled' => 'Đã hủy',
                    })
                    ->sortable(),
                TextColumn::make('payment_method')
                    ->label('Phương thức thanh toán')
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'cod' => 'Thanh toán khi nhận hàng',
                        'banking' => 'Chuyển khoản',
                        'momo' => 'Momo',
                        'zalopay' => 'ZaloPay',
                        'vnpay' => 'VNPay',
                        'paypal' => 'Paypal',
                        'stripe' => 'Stripe',
                        'other' => 'Khác',
                    })
                    ->sortable(),

                TextColumn::make('payment_status')
                    ->label('Trạng thái thanh toán')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'paid' => 'success',
                        'unpaid' => 'danger',
                        'failed' => 'secondary',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'pending' => 'heroicon-o-clock',
                        'paid' => 'heroicon-o-check-circle',
                        'unpaid' => 'heroicon-o-x-circle',
                        'failed' => 'heroicon-o-question-mark-circle',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'pending' => 'Đang chờ thanh toán',
                        'paid' => 'Đã thanh toán',
                        'unpaid' => 'Chưa thanh toán',
                        'failed' => 'Thanh toán thất bại',
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Action::make('Xem chi tiết đơn hàng')
                    ->url(fn(Order $record): String => OrderResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-o-eye')
                    ->openUrlInNewTab()
                    ->color('info'),
            ])
        ;
    }
}
