<?php

namespace App\Filament\Resources\JenisSumberDayaResource\Pages;

use App\Filament\Resources\JenisSumberDayaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenisSumberDayas extends ListRecords
{
    protected static string $resource = JenisSumberDayaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
