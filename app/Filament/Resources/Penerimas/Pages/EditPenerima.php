<?php

namespace App\Filament\Resources\Penerimas\Pages;

use App\Filament\Resources\Penerimas\PenerimaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPenerima extends EditRecord
{
    protected static string $resource = PenerimaResource::class;

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
