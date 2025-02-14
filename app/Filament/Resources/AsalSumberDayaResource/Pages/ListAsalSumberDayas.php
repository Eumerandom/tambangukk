<?php

namespace App\Filament\Resources\AsalSumberDayaResource\Pages;

use App\Filament\Resources\AsalSumberDayaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAsalSumberDayas extends ListRecords
{
    protected static string $resource = AsalSumberDayaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
