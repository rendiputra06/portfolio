<?php

namespace App\Filament\Resources\ProfileCardResource\Pages;

use App\Filament\Resources\ProfileCardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfileCards extends ListRecords
{
    protected static string $resource = ProfileCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
