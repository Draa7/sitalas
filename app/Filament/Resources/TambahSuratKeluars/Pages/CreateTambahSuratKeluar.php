<?php

namespace App\Filament\Resources\TambahSuratKeluars\Pages;

use App\Filament\Resources\TambahSuratKeluars\TambahSuratKeluarResource;
use Filament\Resources\Pages\CreateRecord;
use Psy\CodeCleaner\FunctionContextPass;

class CreateTambahSuratKeluar extends CreateRecord
{
    protected static string $resource = TambahSuratKeluarResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
