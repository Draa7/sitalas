<?php

namespace App\Filament\Resources\IntruksiDisposisis\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class IntruksiDisposisiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('direktorat_id')
                    ->label('Direktorat')
                    ->relationship('unitPengolah', 'direktorat')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                TextInput::make('intruksi')
                    ->required(),
                TextInput::make('urutan')
                    ->required()
                    ->numeric(),
                Toggle::make('active')
                    ->required(),
            ]);
    }
}
