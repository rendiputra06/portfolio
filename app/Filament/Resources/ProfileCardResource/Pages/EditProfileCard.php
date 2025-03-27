<?php

namespace App\Filament\Resources\ProfileCardResource\Pages;

use App\Filament\Resources\ProfileCardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfileCard extends EditRecord
{
    protected static string $resource = ProfileCardResource::class;

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
