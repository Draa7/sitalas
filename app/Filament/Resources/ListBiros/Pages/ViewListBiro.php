<?php

namespace App\Filament\Resources\ListBiros\Pages;

use App\Filament\Resources\ListBiros\ListBiroResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewListBiro extends ViewRecord
{
    protected static string $resource = ListBiroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
