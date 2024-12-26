<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Tabs;
use Illuminate\Support\Str;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Меню';

    protected static ?string $modelLabel = 'Страницы';

    protected static ?string $pluralModelLabel = 'Страницы';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title_kz')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('title_ru')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('parent_id')
                            ->options(Menu::all()->pluck('title_kz', 'id')),
                        Forms\Components\TextInput::make('link')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('sort')
                            ->required()
                            ->numeric()
                            ->default(0),
                        Forms\Components\Select::make('category_id')
                            ->required()
                            ->relationship('category', 'title'),
                        Forms\Components\Toggle::make('active')
                            ->required()
                            ->default(1),
                    ]),

                Forms\Components\Section::make('Страница')
                    ->relationship('page',condition: fn (?array $state): bool => filled($state['title_kz']))
                    ->schema([
                        Forms\Components\Tabs::make('Tabs')
                            ->tabs([
                                Tabs\Tab::make('kz')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_kz')
                                            ->maxLength(255)
                                            ->reactive()
                                            ->debounce(500)
                                            ->afterStateUpdated(function (Forms\Set $set, $state) {
                                                $set('slug', Str::slug($state));
                                            }),
                                        TiptapEditor::make('content_kz')
                                            ->requiredWith('title_kz')
                                            ->directory('page')
                                            ->columnSpanFull(),
                                    ]),
                                Tabs\Tab::make('ru')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_ru')
                                            ->requiredWith('title_kz')
                                            ->maxLength(255),
                                        TiptapEditor::make('content_ru')
                                            ->requiredWith('title_kz')
                                            ->directory('page')
                                            ->columnSpanFull(),
                                    ])
                            ]),
                        Forms\Components\TextInput::make('slug')
                            ->requiredWith('title_kz')
                            ->unique(ignorable: fn ($record) => $record)
                            ->maxLength(255),
                        Forms\Components\Select::make('parent_id')
                            ->options(Page::all()->pluck('title_kz', 'id')),
                        Forms\Components\Toggle::make('active')
                            ->default(1),
                    ])
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
                Tables\Columns\TextColumn::make('parent.title_kz')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
