<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class AddressRelationManager extends RelationManager
{
    protected static string $relationship = 'address';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')
                    ->label('Họ')
                    ->required()
                    ->maxLength(255),

                TextInput::make('last_name')
                    ->label('Tên')
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label('Số điện thoại')
                    ->required()
                    ->maxLength(20)
                    ->tel(),

                TextInput::make('city')
                    ->label('Thành phố')
                    ->required()
                    ->maxLength(255),

                TextInput::make('state')
                    ->label('Quận/Huyện')
                    ->required()
                    ->maxLength(255),

                TextInput::make('zip_code')
                    ->label('Mã bưu điện')
                    ->required()
                    ->maxLength(20),

                Textarea::make('street_address')
                    ->label('Địa chỉ đường/phố')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('street_address')
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->label('Họ')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->label('Tên')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Số điện thoại')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->label('Thành phố')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->label('Quận/Huyện')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('zip_code')
                    ->label('Mã bưu điện')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('street_address')
                    ->label('Địa chỉ đường/phố')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
