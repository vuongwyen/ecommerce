<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Article Details')->schema([
                    TextInput::make('title')->required()->maxLength(255),
                    TextInput::make('slug')->required()->unique(ignoreRecord: true)->maxLength(255),
                    Textarea::make('excerpt')->rows(2)->maxLength(500),
                    RichEditor::make('content')->required(),
                    FileUpload::make('featured_image')->image()->directory('articles/featured_images')->maxSize(2048),
                ]),
                Fieldset::make('SEO')->schema([
                    TextInput::make('meta_title')->maxLength(255),
                    Textarea::make('meta_description')->rows(2)->maxLength(500),
                ]),
                Fieldset::make('Publishing')->schema([
                    DateTimePicker::make('published_at'),
                    Select::make('status')->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ])->required(),
                    Select::make('author_id')
                        ->relationship('author', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                ImageColumn::make('featured_image')->circular(),
                TextColumn::make('author.name')->label('Author')->sortable(),
                TextColumn::make('status')->sortable(),
                TextColumn::make('published_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
