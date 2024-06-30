<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublicationsDataResource\Pages;
use App\Filament\Resources\PublicationsDataResource\RelationManagers;
use App\Models\PublicationsData;
use App\Models\PublicationsDataCategory;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Tabs;
class PublicationsDataResource extends Resource
{
    protected static ?string $model = PublicationsData::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'База данных';

    protected static ?string $modelLabel = 'База данных';

    protected static ?string $pluralModelLabel = 'База данных';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                    ->schema([
                        Tabs::make('')
                            ->tabs([
                                Tabs\Tab::make('kz')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_kz')
                                            ->required()
                                            ->maxLength(255),
                                        TiptapEditor::make('description_kz')
                                            ->required()
                                            ->directory('publications')
                                            ->columnSpanFull(),
                                    ]),
                                Tabs\Tab::make('ru')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_ru')
                                            ->required()
                                            ->maxLength(255),
                                        TiptapEditor::make('description_ru')
                                            ->required()
                                            ->directory('publications')
                                            ->columnSpanFull(),
                                    ]),
                                Tabs\Tab::make('en')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_en')
                                            ->maxLength(255),
                                        TiptapEditor::make('description_en')
                                            ->directory('publications')
                                            ->columnSpanFull(),
                                    ])
                            ]),
                        Forms\Components\Select::make('category_id')
                            ->options(PublicationsDataCategory::all()->pluck('title_kz', 'id'))
                            ->label('Category')
                            ->required(),
                        Forms\Components\Toggle::make('active')
                            ->default(1),
                    ])->columnSpan(8),
                Section::make('')
                    ->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->image()
                            ->directory('logo')
                            ->label('logo'),
                    ])->columnSpan(4)
            ])->columns(12);
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
                Tables\Columns\TextColumn::make('logo')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
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
            'index' => Pages\ListPublicationsData::route('/'),
            'create' => Pages\CreatePublicationsData::route('/create'),
            'edit' => Pages\EditPublicationsData::route('/{record}/edit'),
        ];
    }
}
