<?php

namespace App\Filament\Resources\DatabaseListResource\Pages;

use App\Filament\Resources\DatabaseListResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDatabaseLists extends ListRecords
{
    protected static string $resource = DatabaseListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
