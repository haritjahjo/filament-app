<?php

namespace App\Filament\Resources\PengusahaResource\Pages;

use App\Filament\Resources\PengusahaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePengusaha extends CreateRecord
{
    protected static string $resource = PengusahaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
