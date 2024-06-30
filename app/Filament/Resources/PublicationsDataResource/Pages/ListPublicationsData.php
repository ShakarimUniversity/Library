<?php

namespace App\Filament\Resources\PublicationsDataResource\Pages;

use App\Filament\Resources\PublicationsDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPublicationsData extends ListRecords
{
    protected static string $resource = PublicationsDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
