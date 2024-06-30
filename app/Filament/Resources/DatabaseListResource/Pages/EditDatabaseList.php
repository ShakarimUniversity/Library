<?php

namespace App\Filament\Resources\DatabaseListResource\Pages;

use App\Filament\Resources\DatabaseListResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDatabaseList extends EditRecord
{
    protected static string $resource = DatabaseListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
