<?php

namespace App\Filament\Resources\TextDescriptionResource\Pages;

use App\Filament\Resources\TextDescriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTextDescriptions extends ListRecords
{
    protected static string $resource = TextDescriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
