<?php

namespace App\Filament\Resources\DataTableResource\Pages;

use App\Filament\Resources\DataTableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataTables extends ListRecords
{
    protected static string $resource = DataTableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
