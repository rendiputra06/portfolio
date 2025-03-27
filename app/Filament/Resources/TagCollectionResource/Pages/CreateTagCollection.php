<?php

namespace App\Filament\Resources\TagCollectionResource\Pages;

use App\Filament\Resources\TagCollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTagCollection extends CreateRecord
{
    protected static string $resource = TagCollectionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
