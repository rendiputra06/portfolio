<?php

namespace App\Filament\Resources\ProfileCardResource\Pages;

use App\Filament\Resources\ProfileCardResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfileCard extends CreateRecord
{
    protected static string $resource = ProfileCardResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
