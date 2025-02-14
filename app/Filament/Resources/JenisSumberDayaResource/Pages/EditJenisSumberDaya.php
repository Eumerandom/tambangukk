<?php

namespace App\Filament\Resources\JenisSumberDayaResource\Pages;

use App\Filament\Resources\JenisSumberDayaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisSumberDaya extends EditRecord
{
    protected static string $resource = JenisSumberDayaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
