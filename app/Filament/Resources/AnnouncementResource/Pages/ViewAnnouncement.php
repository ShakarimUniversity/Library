<?php

namespace App\Filament\Resources\PostResource\Pages;


use App\Filament\Resources\AnnouncementResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAnnouncement extends ViewRecord
{
    protected static string $resource = AnnouncementResource::class;

    protected function getActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

//    protected function getHeaderWidgets(): array
//    {
//        return [
//            PostResource\Widgets\PostOverview::class
//        ];
//    }
}
