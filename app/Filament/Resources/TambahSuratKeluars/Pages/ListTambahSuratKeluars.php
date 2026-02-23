<?php

namespace App\Filament\Resources\TambahSuratKeluars\Pages;

use App\Filament\Resources\TambahSuratKeluars\TambahSuratKeluarResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTambahSuratKeluars extends ListRecords
{
    protected static string $resource = TambahSuratKeluarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
