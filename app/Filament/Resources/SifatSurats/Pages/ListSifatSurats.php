<?php

namespace App\Filament\Resources\SifatSurats\Pages;

use App\Filament\Resources\SifatSurats\SifatSuratResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSifatSurats extends ListRecords
{
    protected static string $resource = SifatSuratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
