<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublicationsDataCategoryResource\Pages;
use App\Filament\Resources\PublicationsDataCategoryResource\RelationManagers;
use App\Models\PublicationsDataCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PublicationsDataCategoryResource extends Resource
{
    protected static ?string $model = PublicationsDataCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Категории базы данных';

    protected static ?string $modelLabel = 'Категории базы данных';

    protected static ?string $pluralModelLabel = 'Категории базы данных';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title_kz')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title_ru')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title_en')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_kz')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_ru')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_en')
                    ->searchable(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePublicationsDataCategories::route('/'),
        ];
    }
}
