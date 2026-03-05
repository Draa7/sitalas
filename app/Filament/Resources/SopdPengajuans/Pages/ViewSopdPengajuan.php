<?php

namespace App\Filament\Resources\SopdPengajuans\Pages;

use App\Filament\Resources\SopdPengajuans\SopdPengajuanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSopdPengajuan extends ViewRecord
{
    protected static string $resource = SopdPengajuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
