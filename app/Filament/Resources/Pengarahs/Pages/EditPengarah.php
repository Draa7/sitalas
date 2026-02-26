<?php

namespace App\Filament\Resources\Pengarahs\Pages;

use App\Filament\Resources\Pengarahs\PengarahResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPengarah extends EditRecord
{
    protected static string $resource = PengarahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
