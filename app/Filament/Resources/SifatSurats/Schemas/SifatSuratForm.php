<?php

namespace App\Filament\Resources\SifatSurats\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SifatSuratForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('sifat_surat')
                                                        
                    ->required(),
            ]);
    }
}
