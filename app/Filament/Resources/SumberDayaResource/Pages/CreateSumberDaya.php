<?php

namespace App\Filament\Resources\SumberDayaResource\Pages;

use App\Filament\Resources\SumberDayaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSumberDaya extends CreateRecord
{
    protected static string $resource = SumberDayaResource::class;

     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
