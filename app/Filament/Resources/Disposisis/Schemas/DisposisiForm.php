<?php

namespace App\Filament\Resources\Disposisis\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class DisposisiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Disposisi')
                ->schema([
                    TextInput::make('jenis_disposisi')
                        ->label('Jenis Disposisi')
                        ->placeholder('Contoh: Segera / Penting / Rahasia')
                        ->required(),
                ]),
        ]);
    }
}
