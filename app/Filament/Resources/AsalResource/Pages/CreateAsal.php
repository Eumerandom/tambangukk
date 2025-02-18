<?php

namespace App\Filament\Resources\AsalResource\Pages;

use App\Filament\Resources\AsalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAsal extends CreateRecord
{
    protected static string $resource = AsalResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
