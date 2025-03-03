<?php

namespace App\Filament\Resources\PageResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageListsRelationManager extends RelationManager
{
    protected static string $relationship = 'pageLists';

    protected static ?string $title = 'Список';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('kz')
                            ->schema([
                                Forms\Components\TextInput::make('title_kz')
                                    ->label('Заголовок(kz)')
                                    ->required()
                                    ->maxLength(255),
                                TiptapEditor::make('description_kz')
                                    ->label('Описание(kz)')
                                    ->profile('minimal')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('ru')
                            ->schema([
                                Forms\Components\TextInput::make('title_ru')
                                    ->label('Заголовок(ru)')
                                    ->required()
                                    ->maxLength(255),
                                TiptapEditor::make('description_ru')
                                    ->label('Описание(ru)')
                                    ->profile('minimal')
                                    ->columnSpanFull(),
                            ])
                    ]),
                Forms\Components\TextInput::make('position')
                    ->label('Позиция')
                    ->required()
                    ->numeric()
                    ->default(0),
            ])->columnSpan(8),
                Forms\Components\Section::make()
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->label('Картинка')
                    ->required()
                    ->image()
                    ->directory('page_list/img'),
                Forms\Components\FileUpload::make('filename')
                    ->label('Файл')
                    ->required()
                    ->directory('page_list/file'),
            ])->columnSpan(4),

            ])->columns(12);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title_kz')
            ->columns([
                Tables\Columns\TextColumn::make('title_kz')
                    ->label('Заголовок'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
