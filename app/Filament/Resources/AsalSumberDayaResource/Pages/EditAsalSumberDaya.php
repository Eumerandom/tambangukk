<?php

namespace App\Filament\Resources\AsalSumberDayaResource\Pages;

use App\Filament\Resources\AsalSumberDayaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAsalSumberDaya extends EditRecord
{
    protected static string $resource = AsalSumberDayaResource::class;

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
