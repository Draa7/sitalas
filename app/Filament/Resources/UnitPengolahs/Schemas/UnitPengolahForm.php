<?php

namespace App\Filament\Resources\UnitPengolahs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UnitPengolahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('direktorat')
                    ->required(),
                TextInput::make('kode_surat'),
                TextInput::make('urutan')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('no_hp_1'),
                TextInput::make('no_hp_2'),
                TextInput::make('no_hp_3'),
                TextInput::make('no_hp_4'),
                Toggle::make('bold')
                    ->required(),
                Toggle::make('all_data')
                    ->required(),
                Toggle::make('sekretaris')
                    ->required(),
                Toggle::make('asisten')
                    ->required(),
                Toggle::make('biro')
                    ->required(),
                Toggle::make('sub_biro')
                    ->required(),
                Toggle::make('active')
                    ->required(),
            ]);
    }
}
