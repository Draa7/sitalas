<?php

namespace App\Filament\Resources\UnitPengolahs\Pages;

use App\Filament\Resources\UnitPengolahs\UnitPengolahResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUnitPengolah extends EditRecord
{
    protected static string $resource = UnitPengolahResource::class;

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
