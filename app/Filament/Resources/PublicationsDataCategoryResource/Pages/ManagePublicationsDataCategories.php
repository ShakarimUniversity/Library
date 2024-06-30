<?php

namespace App\Filament\Resources\PublicationsDataCategoryResource\Pages;

use App\Filament\Resources\PublicationsDataCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePublicationsDataCategories extends ManageRecords
{
    protected static string $resource = PublicationsDataCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
