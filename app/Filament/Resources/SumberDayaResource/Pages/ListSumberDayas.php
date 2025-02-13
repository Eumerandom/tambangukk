<?php

namespace App\Filament\Resources\SumberDayaResource\Pages;

use App\Filament\Resources\SumberDayaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSumberDayas extends ListRecords
{
    protected static string $resource = SumberDayaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
