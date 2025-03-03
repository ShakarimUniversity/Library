<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Filament\Resources\PageResource\RelationManagers\PageListsRelationManager;
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
use Illuminate\Support\Str;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
                    ->schema([
                        Forms\Components\Tabs::make('Tabs')
                            ->tabs([
                                Forms\Components\Tabs\Tab::make('kz')
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
                                Forms\Components\Tabs\Tab::make('ru')
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
                        Forms\Components\Select::make('menu_id')
                            ->label('Меню')
                            ->options(Menu::all()->pluck('title_ru', 'id'))
                            ->searchable(),
                        Forms\Components\Select::make('parent_id')
                            ->label('Родительская страница')
                            ->options(Page::all()->pluck('title_kz', 'id')),
                        Forms\Components\Toggle::make('active')
                            ->label('Активный')
                            ->default(1),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_kz')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('menu.title_kz')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
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
            PageListsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
