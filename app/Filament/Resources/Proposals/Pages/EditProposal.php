<?php

namespace App\Filament\Resources\Proposals\Pages;

use App\Filament\Resources\Proposals\ProposalResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use PhpParser\Builder\Function_;

class EditProposal extends EditRecord
{
    protected static string $resource = ProposalResource::class;

    protected function getRedirectUrl(): ?string
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
