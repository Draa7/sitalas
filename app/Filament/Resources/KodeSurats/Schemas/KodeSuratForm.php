<?php

namespace App\Filament\Resources\KodeSurats\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KodeSuratForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode')
                    ->required(),
                TextInput::make('index')
                    ->required(),
                TextInput::make('tahun')
                    ->numeric()
                    ->required(),
            ]);
    }
}
