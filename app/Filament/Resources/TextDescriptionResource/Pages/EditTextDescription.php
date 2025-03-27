<?php

namespace App\Filament\Resources\TextDescriptionResource\Pages;

use App\Filament\Resources\TextDescriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTextDescription extends EditRecord
{
    protected static string $resource = TextDescriptionResource::class;

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
