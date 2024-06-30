<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DatabaseListResource\Pages;
use App\Filament\Resources\DatabaseListResource\RelationManagers;
use App\Models\DatabaseList;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DatabaseListResource extends Resource
{
    protected static ?string $model = DatabaseList::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Базы данных открытого доступа';

    protected static ?string $modelLabel = 'Базы данных открытого доступа';

    protected static ?string $pluralModelLabel = 'Базы данных открытого доступа';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description_kz')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('description_ru')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('description_en')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('link')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('initial')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListDatabaseLists::route('/'),
            'create' => Pages\CreateDatabaseList::route('/create'),
            'edit' => Pages\EditDatabaseList::route('/{record}/edit'),
        ];
    }
}
