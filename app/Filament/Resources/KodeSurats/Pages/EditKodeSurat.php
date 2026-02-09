<?php

namespace App\Filament\Resources\KodeSurats\Pages;

use App\Filament\Resources\KodeSurats\KodeSuratResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKodeSurat extends EditRecord
{
    protected static string $resource = KodeSuratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
