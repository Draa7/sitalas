<?php

namespace App\Filament\Resources\IntruksiDisposisis\Pages;

use App\Filament\Resources\IntruksiDisposisis\IntruksiDisposisiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIntruksiDisposisi extends EditRecord
{
    protected static string $resource = IntruksiDisposisiResource::class;

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
