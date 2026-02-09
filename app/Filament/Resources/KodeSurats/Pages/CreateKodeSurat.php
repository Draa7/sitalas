<?php

namespace App\Filament\Resources\KodeSurats\Pages;

use App\Filament\Resources\KodeSurats\KodeSuratResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKodeSurat extends CreateRecord
{
    protected static string $resource = KodeSuratResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
