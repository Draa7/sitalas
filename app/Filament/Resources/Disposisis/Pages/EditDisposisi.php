<?php

namespace App\Filament\Resources\Disposisis\Pages;

use App\Filament\Resources\Disposisis\DisposisiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDisposisi extends EditRecord
{
    protected static string $resource = DisposisiResource::class;

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
