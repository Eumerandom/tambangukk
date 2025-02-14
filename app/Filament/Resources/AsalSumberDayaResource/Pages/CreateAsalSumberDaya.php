<?php

namespace App\Filament\Resources\AsalSumberDayaResource\Pages;

use App\Filament\Resources\AsalSumberDayaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAsalSumberDaya extends CreateRecord
{
    protected static string $resource = AsalSumberDayaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
