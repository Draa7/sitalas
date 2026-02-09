<?php

namespace App\Filament\Resources\Klasifikasis\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KlasifikasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('klasifikasi')
                    ->label('klasifikasi surat')
                    ->required(),
            ]);
    }
}
