<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Электронные ресурсы';

    protected static ?string $modelLabel = 'Электронные ресурсы';

    protected static ?string $pluralModelLabel = 'Электронные ресурсы';

    protected static ?string $navigationGroup = 'Электронные ресурсы';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->label('Категория')
                    ->required()
                    ->relationship('category', 'name_ru'),
                Forms\Components\TextInput::make('book_name')
                    ->label('Наименование')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('author')
                    ->label('Автор')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('isbn')
                    ->maxLength(255),

            ])->columnSpan(8),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\FileUpload::make('file_name')
                            ->required()
                            ->directory(fn ($get) => 'ebooks/' . $get('category_id'))
                            ->acceptedFileTypes(['application/pdf'])
                            ->label('Файл'),

                    ])->columnSpan(4)
            ])->columns(12);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name_ru')
                    ->label('Категория'),
                Tables\Columns\TextColumn::make('book_name')
                    ->label('Наименование')
                    ->placeholder('Нет наименование')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author')
                    ->label('Автор')
                    ->searchable(),
                Tables\Columns\TextColumn::make('isbn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file')
                    ->label('Файл')
                    ->default('Открыть')
                    ->url(fn (Book $record): string => $record->getBook())
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultPaginationPageOption(25)
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->relationship('category', 'name_ru')->label('Категория')
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
