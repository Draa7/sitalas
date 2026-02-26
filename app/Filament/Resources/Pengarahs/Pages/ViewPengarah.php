<?php

namespace App\Filament\Resources\Pengarahs\Pages;

use App\Filament\Resources\Pengarahs\PengarahResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPengarah extends ViewRecord
{
    protected static string $resource = PengarahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
