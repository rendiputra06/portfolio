<?php

namespace App\Filament\Resources\DataTableResource\Pages;

use App\Filament\Resources\DataTableResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataTable extends EditRecord
{
    protected static string $resource = DataTableResource::class;

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
