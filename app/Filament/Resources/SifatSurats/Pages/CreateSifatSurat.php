<?php

namespace App\Filament\Resources\SifatSurats\Pages;

use App\Filament\Resources\SifatSurats\SifatSuratResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSifatSurat extends CreateRecord
{
    protected static string $resource = SifatSuratResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
