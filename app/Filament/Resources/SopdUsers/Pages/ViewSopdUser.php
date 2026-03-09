<?php

namespace App\Filament\Resources\SopdUsers\Pages;

use App\Filament\Resources\SopdUsers\SopdUserResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSopdUser extends ViewRecord
{
    protected static string $resource = SopdUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
