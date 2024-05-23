<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
//use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Models\Contracts\FilamentUser;
use Filament\Pages\Page;
use Filament\Panel;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

Class UserResource extends Resource implements FilamentUser
{

    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Қолданушылар';

    public static function canAccess(): bool
    {
        $user = auth()->user();
        return $user->hasRole('Admin');
    }

//    public static function getModelLabel(): string
//    {
//        return 'Қолданушылар';
//    }


    public static function getPluralLabel(): ?string
    {
        return static::getNavigationLabel();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Fullname'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('password')
                    ->label(__('Password'))
                    ->password()
                    ->required(fn(Page $livewire): bool => $livewire instanceof CreateRecord)
                    ->minLength('8')
                    ->dehydrateStateUsing(fn($state)=>Hash::make($state)),
                Forms\Components\CheckboxList::make('roles')
                    ->label(__('Roles'))
                    ->columns(3)
                    ->relationship('roles','name'),
//                Forms\Components\Select::make('roles')
//                ->multiple()
//                ->relationship('roles','name', function ($query) {
//                    return $query->where('name', '!=','Admin');
//                })->preload()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Fullname')),
                Tables\Columns\TextColumn::make('email')
                    ->label('email'),
                Tables\Columns\TagsColumn::make('roles.name')
                    ->label(__('Roles')),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime(),
                /*Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('Updated At'))
                    ->dateTime(),*/
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->paginated([25, 50, 100, 'all'])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public function canAccessFilament(): bool
    {
        return true;
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // TODO: Implement canAccessPanel() method.
    }
}
