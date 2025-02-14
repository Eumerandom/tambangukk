<?php

namespace App\Filament\Resources\SumberDayaResource\Pages;

use App\Filament\Resources\SumberDayaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSumberDaya extends EditRecord
{
    protected static string $resource = SumberDayaResource::class;

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
