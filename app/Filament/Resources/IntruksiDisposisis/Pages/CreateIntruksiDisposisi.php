<?php

namespace App\Filament\Resources\IntruksiDisposisis\Pages;

use App\Filament\Resources\IntruksiDisposisis\IntruksiDisposisiResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIntruksiDisposisi extends CreateRecord
{
    protected static string $resource = IntruksiDisposisiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
