<?php

namespace App\Filament\Resources\UnitPengolahs\Pages;

use App\Filament\Resources\UnitPengolahs\UnitPengolahResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUnitPengolah extends CreateRecord
{
    protected static string $resource = UnitPengolahResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
