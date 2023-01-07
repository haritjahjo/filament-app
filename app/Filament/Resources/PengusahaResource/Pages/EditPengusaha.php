<?php

namespace App\Filament\Resources\PengusahaResource\Pages;

use App\Filament\Resources\PengusahaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengusaha extends EditRecord
{
    protected static string $resource = PengusahaResource::class;

    protected function getActions(): array
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
