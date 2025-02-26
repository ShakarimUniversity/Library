<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use App\Models\Page;
use Filament\Actions\DeleteAction;
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

    protected static ?string $modelLabel = 'Меню';

    protected static ?string $pluralModelLabel = 'Меню';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title_kz')
                            ->label('Заголовок(kz)')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('title_ru')
                            ->label('Заголовок(ru)')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('parent_id')
                            ->label('Родительское меню')
                            ->options(Menu::all()->pluck('title_kz', 'id')),
                        Forms\Components\TextInput::make('link')
                            ->label('Ссылка')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('sort')
                            ->label('Позиция')
                            ->required()
                            ->numeric()
                            ->default(0),
                        Forms\Components\Select::make('category_id')
                            ->label('Категория')
                            ->required()
                            ->relationship('category', 'title'),
                        Forms\Components\Toggle::make('active')
                            ->label('Активный')
                            ->required()
                            ->default(1),
                    ]),

                Forms\Components\Section::make('Контент')
                    ->relationship('page',condition: fn (?array $state): bool => filled($state['title_kz']))
                    ->schema([
                        Forms\Components\Tabs::make('Tabs')
                            ->tabs([
                                Tabs\Tab::make('kz')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_kz')
                                            ->label('Заголовок(kz)')
                                            ->maxLength(255)
                                            ->reactive()
                                            ->debounce(500)
                                            ->afterStateUpdated(function (Forms\Set $set, $state) {
                                                $set('slug', Str::slug($state));
                                            }),
                                        TiptapEditor::make('content_kz')
                                            ->label('Контент(kz)')
                                            ->requiredWith('title_kz')
                                            ->directory('page')
                                            ->columnSpanFull(),
                                    ]),
                                Tabs\Tab::make('ru')
                                    ->schema([
                                        Forms\Components\TextInput::make('title_ru')
                                            ->label('Заголовок(ru)')
                                            ->requiredWith('title_kz')
                                            ->maxLength(255),
                                        TiptapEditor::make('content_ru')
                                            ->label('Контент(ru)')
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
                            ->label('Родительская страница')
                            ->options(Page::all()->pluck('title_kz', 'id')),
                        Forms\Components\Toggle::make('active')
                            ->label('Активный')
                            ->default(1),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_kz')
                    ->label('Заголовок(kz)')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_ru')
                    ->label('Заголовок(ru)')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent.title_kz')
                    ->label('Родительское меню')
                    ->sortable(),
                Tables\Columns\TextColumn::make('link')
                    ->label('Ссылка'),
                Tables\Columns\TextColumn::make('sort')
                    ->label('Позиция')
                    ->numeric(),
                Tables\Columns\TextColumn::make('category_id')
                    ->label('Категория'),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
