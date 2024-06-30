<?php

namespace App\Filament\Resources\DatabaseListResource\Pages;

use App\Filament\Resources\DatabaseListResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDatabaseList extends CreateRecord
{
    protected static string $resource = DatabaseListResource::class;
}
