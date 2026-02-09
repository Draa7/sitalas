<?php

namespace App\Filament\Resources\SifatSurats\Pages;

use App\Filament\Resources\SifatSurats\SifatSuratResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSifatSurat extends EditRecord
{
    protected static string $resource = SifatSuratResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
