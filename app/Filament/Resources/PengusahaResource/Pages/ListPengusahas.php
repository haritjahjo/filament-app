<?php

namespace App\Filament\Resources\PengusahaResource\Pages;

use App\Filament\Resources\PengusahaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengusahas extends ListRecords
{
    protected static string $resource = PengusahaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
