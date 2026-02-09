<?php

namespace App\Filament\Resources\AsistenBiros\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AsistenBiroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('asisten')
                    ->required(),
                TextInput::make('biro')
                    ->required(),
            ]);
    }
}
