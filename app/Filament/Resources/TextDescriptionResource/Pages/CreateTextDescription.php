<?php

namespace App\Filament\Resources\TextDescriptionResource\Pages;

use App\Filament\Resources\TextDescriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTextDescription extends CreateRecord
{
    protected static string $resource = TextDescriptionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
