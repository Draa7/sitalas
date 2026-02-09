<?php

namespace App\Filament\Resources\Proposals\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ProposalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('tanggal')
                    ->required(),
                TextInput::make('no_reg')
                    ->required(),
                Select::make('direktorat_id')
                    ->label('Tujuan')
                    ->relationship('unitPengolah', 'direktorat')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                TextInput::make('pengirim')
                    ->required(),
                TextInput::make('perihal')
                    ->required(),
            ]);
    }
}
