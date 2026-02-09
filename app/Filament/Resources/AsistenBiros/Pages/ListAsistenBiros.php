<?php

namespace App\Filament\Resources\AsistenBiros\Pages;

use App\Filament\Resources\AsistenBiros\AsistenBiroResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAsistenBiros extends ListRecords
{
    protected static string $resource = AsistenBiroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
