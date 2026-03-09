<?php

namespace App\Filament\Resources\ListBiros\Pages;

use App\Filament\Resources\ListBiros\ListBiroResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditListBiro extends EditRecord
{
    protected static string $resource = ListBiroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
