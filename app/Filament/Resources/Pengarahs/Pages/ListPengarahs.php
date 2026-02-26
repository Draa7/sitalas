<?php

namespace App\Filament\Resources\Pengarahs\Pages;

use App\Filament\Resources\Pengarahs\PengarahResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPengarahs extends ListRecords
{
    protected static string $resource = PengarahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
