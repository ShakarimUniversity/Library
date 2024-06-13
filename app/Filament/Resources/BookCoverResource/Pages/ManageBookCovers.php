<?php

namespace App\Filament\Resources\BookCoverResource\Pages;

use App\Filament\Resources\BookCoverResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBookCovers extends ManageRecords
{
    protected static string $resource = BookCoverResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
