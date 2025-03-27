<?php

namespace App\Filament\Resources\TagCollectionResource\Pages;

use App\Filament\Resources\TagCollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTagCollection extends EditRecord
{
    protected static string $resource = TagCollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
