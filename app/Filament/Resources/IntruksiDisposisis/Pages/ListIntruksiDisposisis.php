<?php

namespace App\Filament\Resources\IntruksiDisposisis\Pages;

use App\Filament\Resources\IntruksiDisposisis\IntruksiDisposisiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIntruksiDisposisis extends ListRecords
{
    protected static string $resource = IntruksiDisposisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
