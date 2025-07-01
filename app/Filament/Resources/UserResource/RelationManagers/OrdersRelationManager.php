<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use App\Models\Order;
use App\Filament\Resources\OrderResource;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('id')
                    ->label('Mã đơn hàng')
                    ->searchable(),
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
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Action::make('Xem chi tiết')
                    ->url(fn(Order $record): string => OrderResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->openUrlInNewTab(),
                Tables\Actions\DeleteAction::make()
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->successNotificationTitle('Đơn hàng đã được xóa thành công.'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
