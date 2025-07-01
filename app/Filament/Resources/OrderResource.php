<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use App\Models\Product;
use Filament\Forms\Set;
use Filament\Forms\Get;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\Number;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup = 'Quản lý bán hàng';

    protected static ?string $navigationLabel = 'Quản lý giỏ hàng';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Thông tin đơn hàng')->schema([
                        Select::make('user_id')
                            ->label('Khách hàng')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('payment_method')
                            ->label('Phương thức thanh toán')
                            ->options([
                                'cod' => 'Thanh toán khi nhận hàng',
                                'banking' => 'Chuyển khoản',
                                'momo' => 'Momo',
                                'zalopay' => 'ZaloPay',
                                'vnpay' => 'VNPay',
                                'paypal' => 'Paypal',
                                'stripe' => 'Stripe',
                                'other' => 'Khác',
                            ])
                            ->required(),

                        Select::make('payment_status')
                            ->label('Trạng thái thanh toán')
                            ->options([
                                'pending' => 'Chờ thanh toán',
                                'paid' => 'Đã thanh toán',
                                'failed' => 'Thất bại',
                            ])
                            ->default('pending')
                            ->required(),

                        ToggleButtons::make('status')
                            ->label('Trạng thái đơn hàng')
                            ->inline()
                            ->default('pending')
                            ->required()
                            ->options([
                                'pending' => 'Chờ xử lý',
                                'processing' => 'Đang xử lý',
                                'shipped' => 'Đã giao cho đơn vị vận chuyển',
                                'delivered' => 'Đã giao',
                                'cancelled' => 'Đã hủy',
                            ])
                            ->colors([
                                'pending' => 'warning',
                                'processing' => 'info',
                                'shipped' => 'success',
                                'delivered' => 'success',
                                'cancelled' => 'danger',
                            ])
                            ->icons([
                                'pending' => 'heroicon-m-arrow-path',
                                'processing' => 'heroicon-o-clock',
                                'shipped' => 'heroicon-o-truck',
                                'delivered' => 'heroicon-o-check-circle',
                                'cancelled' => 'heroicon-o-x-circle',
                            ]),

                        Select::make('currency')
                            ->label('Loại tiền tệ')
                            ->options([
                                'vnd' => 'VND',
                                'usd' => 'USD',
                                'eur' => 'EUR',
                            ])
                            ->default('vnd')
                            ->required(),

                        Select::make('shipping_method')
                            ->label('Đơn vị vận chuyển')
                            ->options([
                                'giaohangtietkiem' => 'Giao hàng tiết kiệm',
                                'jtexpress' => 'JTEXPRESS',
                                'viettelpost' => 'VIETTELPOST',
                                'vnpost' => 'VNPOST',
                                'giaohangnhanh' => 'Giao hàng nhanh',
                            ])
                            ->default('giaohangtietkiem')
                            ->required(),

                        TextArea::make('notes')
                            ->label('Ghi chú')
                            ->columnSpanFull(),
                    ])->columns(2),

                    Section::make('Chi tiết đơn hàng')->schema([
                        Repeater::make('items')
                            ->relationship('items')
                            ->label('Sản phẩm')
                            ->schema([
                                Select::make('product_id')
                                    ->label('Sản phẩm')
                                    ->relationship('product', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->distinct()
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                    ->reactive()
                                    ->afterStateUpdated(fn($state, Set $set) => $set('unit_amount', Product::find($state)?->price ?? 0))
                                    ->afterStateUpdated(fn($state, Set $set) => $set('total_amount', Product::find($state)?->price ?? 0))
                                    ->columnSpan(4),

                                TextInput::make('quantity')
                                    ->label('Số lượng')
                                    ->numeric()
                                    ->minValue(1)
                                    ->required()
                                    ->default(1)
                                    ->columnSpan(2)
                                    ->reactive()
                                    ->afterStateUpdated(fn($state, Set $set, Get $get) => $set('total_amount', $state * $get('unit_amount'))),

                                TextInput::make('unit_amount')
                                    ->label('Đơn giá')
                                    ->numeric()
                                    ->required()
                                    ->disabled()
                                    ->dehydrated()
                                    ->columnSpan(3),

                                TextInput::make('total_amount')
                                    ->label('Thành tiền')
                                    ->numeric()
                                    ->required()
                                    ->dehydrated()
                                    ->columnSpan(3),
                            ])->columns(12),
                        Placeholder::make('grand_total_amount')
                            ->label('Tổng tiền')
                            ->content(function (Get $get, Set $set) {
                                $total = 0;
                                if (!$repeaters = $get('items')) {
                                    return $total;
                                }
                                foreach ($repeaters as $key => $repeater) {
                                    $total += $get("items.{$key}.total_amount");
                                }
                                $set('grand_total', $total);
                                return Number::currency($total, $get('currency'));
                            }),

                        Hidden::make('grand_total')
                            ->label('Tổng tiền')
                            ->default(0),
                    ]),
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Khách hàng')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('grand_total')
                    ->label('Tổng tiền')
                    ->numeric()
                    ->money('VND'),

                TextColumn::make('payment_method')
                    ->label('Phương thức thanh toán')
                    ->searchable()
                    ->sortable(),

                SelectColumn::make('payment_status')
                    ->label('Trạng thái thanh toán')
                    ->options([
                        'pending' => 'Chờ thanh toán',
                        'paid' => 'Đã thanh toán',
                        'failed' => 'Thất bại',
                    ])
                    ->searchable()
                    ->sortable(),

                TextColumn::make('shipping_method')
                    ->label('Đơn vị vận chuyển')
                    ->searchable()
                    ->sortable(),

                SelectColumn::make('status')
                    ->label('Trạng thái đơn hàng')
                    ->options([
                        'pending' => 'Chờ xử lý',
                        'processing' => 'Đang xử lý',
                        'shipped' => 'Đã giao cho đơn vị vận chuyển',
                        'delivered' => 'Đã giao',
                        'cancelled' => 'Đã hủy',
                    ])
                    ->searchable()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AddressRelationManager::class,
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return static::getModel()::count() > 10 ? 'success' : 'danger';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
