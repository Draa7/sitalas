<?php

namespace App\Filament\Resources\AsistenBiros\Pages;

use App\Filament\Resources\AsistenBiros\AsistenBiroResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAsistenBiro extends EditRecord
{
    protected static string $resource = AsistenBiroResource::class;

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
