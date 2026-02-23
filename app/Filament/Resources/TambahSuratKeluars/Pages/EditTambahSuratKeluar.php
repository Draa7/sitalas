<?php

namespace App\Filament\Resources\TambahSuratKeluars\Pages;

use App\Filament\Resources\TambahSuratKeluars\TambahSuratKeluarResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTambahSuratKeluar extends EditRecord
{
    protected static string $resource = TambahSuratKeluarResource::class;
    protected function getRedirectUrl(): ?string
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
