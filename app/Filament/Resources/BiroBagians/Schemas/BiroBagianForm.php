<?php

namespace App\Filament\Resources\BiroBagians\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
class BiroBagianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('biro_unit_pengolah_id')
                    ->label('Biro')
                    ->relationship(
                        'biroUnit',
                        'direktorat',
                        modifyQueryUsing: fn ($query) =>
                            $query->where('biro', true) ->where('active', true)
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('sub_biro_unit_pengolah_id')
                    ->label('Bagian')
                    ->relationship(
                        'subBiro',
                        'direktorat',
                        modifyQueryUsing: fn ($query) =>
                            $query->where('sub_biro', true) ->where('active', true)
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}
