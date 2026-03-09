<?php

namespace App\Filament\Resources\SopdUsers\Pages;

use App\Filament\Resources\SopdUsers\SopdUserResource;
use Filament\Resources\Pages\ListRecords;

class ListSopdUsers extends ListRecords
{
    protected static string $resource = SopdUserResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}