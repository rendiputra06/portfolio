<?php

namespace App\Filament\Resources\TagCollectionResource\Pages;

use App\Filament\Resources\TagCollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTagCollections extends ListRecords
{
    protected static string $resource = TagCollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
