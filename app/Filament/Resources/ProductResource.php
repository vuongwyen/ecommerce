<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Filters\SelectFilter;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Quản lý hàng hóa';

    protected static ?string $navigationLabel = 'Sản phẩm';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Thông tin sản phẩm')->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                            ->label('Tên sản phẩm'),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->disabled()
                            ->dehydrated()
                            ->unique(Product::class, 'slug', ignoreRecord: true)
                            ->label('Slug'),
                        MarkdownEditor::make('description')
                            ->required()
                            ->columnSpanFull()
                            ->fileAttachmentsDisk('products')
                            ->label('Mô tả sản phẩm')
                    ])->columns(2),

                    Section::make('Hình ảnh sản phẩm')->schema([
                        Forms\Components\FileUpload::make('images')
                            ->multiple()
                            ->reorderable()
                            ->directory('products')
                            ->maxFiles(10)
                            ->label('Hình ảnh sản phẩm'),
                    ])
                ])->columns(2),

                Group::make()->schema([
                    Section::make('Price')->schema([
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->prefix('VND')
                            ->label('Giá sản phẩm'),
                    ]),
                    Section::make('Associations')->schema([
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->label('Danh mục sản phẩm'),
                        Select::make('brand_id')
                            ->relationship('brand', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->label('Thương hiệu sản phẩm'),
                    ]),

                    Section::make('Status')->schema([
                        Toggle::make('in_stock')
                            ->required()
                            ->default(true)
                            ->label('Còn hàng'),
                        Toggle::make('is_active')
                            ->required()
                            ->default(true)
                            ->label('Kích hoạt sản phẩm'),
                        Toggle::make('is_featured')
                            ->required()
                            ->default(false)
                            ->label('Nổi bật'),
                        Toggle::make('on_sale')
                            ->required(),
                    ])
                ])->columnSpan(1)
            ])->columns('2');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable()
                    ->label('ID'),
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label('Tên sản phẩm'),
                Tables\Columns\TextColumn::make('slug')
                    ->sortable()
                    ->searchable()
                    ->label('Slug'),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Hình ảnh'),
                Tables\Columns\TextColumn::make('price')
                    ->sortable()
                    ->money('VND')
                    ->label('Giá'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Kích hoạt'),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Nổi bật'),
                Tables\Columns\IconColumn::make('on_sale')
                    ->boolean()
                    ->label('Giảm giá'),
                Tables\Columns\IconColumn::make('in_stock')
                    ->boolean()
                    ->label('Còn hàng'),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Danh mục sản phẩm'),
                SelectFilter::make('brand_id')
                    ->relationship('brand', 'name')
                    ->label('Thương hiệu sản phẩm'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
