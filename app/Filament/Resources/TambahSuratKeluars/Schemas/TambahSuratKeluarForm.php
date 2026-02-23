<?php

namespace App\Filament\Resources\TambahSuratKeluars\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TambahSuratKeluarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('tanggal_surat')
                    ->required(),
                TextInput::make('klasifikasi_id')
                    ->required()
                    ->numeric(),
                TextInput::make('no_urut')
                    ->required()
                    ->numeric(),
                TextInput::make('kode_id')
                    ->required()
                    ->numeric(),
                TextInput::make('no_surat')
                    ->required(),
                TextInput::make('sifat_surat_id')
                    ->required()
                    ->numeric(),
                Textarea::make('perihal')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('direktorat_id')
                    ->required()
                    ->numeric(),
                TextInput::make('kontak_person')
                    ->required(),
                TextInput::make('kepada')
                    ->required(),
                Textarea::make('keterangan')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('upload_file')
                    ->required(),
                Textarea::make('lampiran')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
