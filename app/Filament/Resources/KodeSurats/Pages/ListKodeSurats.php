<?php

namespace App\Filament\Resources\KodeSurats\Pages;

use App\Filament\Resources\KodeSurats\KodeSuratResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKodeSurats extends ListRecords
{
    protected static string $resource = KodeSuratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
