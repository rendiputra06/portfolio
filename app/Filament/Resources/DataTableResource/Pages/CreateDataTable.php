<?php

namespace App\Filament\Resources\DataTableResource\Pages;

use App\Filament\Resources\DataTableResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDataTable extends CreateRecord
{
    protected static string $resource = DataTableResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
