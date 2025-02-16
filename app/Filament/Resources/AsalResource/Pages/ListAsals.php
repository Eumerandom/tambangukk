<?php

namespace App\Filament\Resources\AsalResource\Pages;

use App\Filament\Resources\AsalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAsals extends ListRecords
{
    protected static string $resource = AsalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
