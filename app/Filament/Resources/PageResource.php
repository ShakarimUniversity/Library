<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Menu;
use App\Models\Page;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
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

    protected static ?string $navigationGroup = 'Контент';

    protected static ?string $navigationLabel = 'Страницы';

    protected static ?string $modelLabel = 'Страницы';

    protected static ?string $pluralModelLabel = 'Страницы';

    public static function canAccess(): bool
    {
        $user = auth()->user();
        return $user->hasRole('Manager') || $user->hasRole('Admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title_kz')
                    ->required()
                    ->maxLength(255)
                    ->reactive()
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('title_ru')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
//                Forms\Components\RichEditor::make('content_kz')
//                    ->required()
//                    ->columnSpanFull(),
//                TiptapEditor::make('content_kz')
//                    ->profile('default|simple|minimal|none|custom')
//                    ->tools([]) // individual tools to use in the editor, overwrites profile
//                    ->disk('string') // optional, defaults to config setting
//                    ->directory('string or Closure returning a string') // optional, defaults to config setting
//                    ->acceptedFileTypes(['array of file types']) // optional, defaults to config setting
//                    ->maxContentWidth('5xl')
//                    ->required()
//                    ->columnSpanFull(),
                TiptapEditor::make('content_kz')
                    ->required()
                    ->columnSpanFull(),
                TiptapEditor::make('content_ru')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('menu_id')
                    ->options(Menu::all()->pluck('title_kz', 'id')),
                Forms\Components\Select::make('parent_id')
                    ->options(Page::all()->pluck('title_kz', 'id')),
                Forms\Components\Toggle::make('active')
                    ->required(),
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
//                Tables\Columns\TextColumn::make('slug')
//                    ->searchable(),
                Tables\Columns\TextColumn::make('menu.title_kz'),
                Tables\Columns\TextColumn::make('parent.title_kz'),
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
            //
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
