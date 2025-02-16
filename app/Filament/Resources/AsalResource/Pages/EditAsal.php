<?php

namespace App\Filament\Resources\AsalResource\Pages;

use App\Filament\Resources\AsalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAsal extends EditRecord
{
    protected static string $resource = AsalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
