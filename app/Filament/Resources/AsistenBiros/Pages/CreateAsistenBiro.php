<?php

namespace App\Filament\Resources\AsistenBiros\Pages;

use App\Filament\Resources\AsistenBiros\AsistenBiroResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAsistenBiro extends CreateRecord
{
    protected static string $resource = AsistenBiroResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
