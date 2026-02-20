<?php

namespace App\Filament\Resources\Penerimas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class PenerimaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('tanggal_terima')
                    ->required(),
                DatePicker::make('tanggal_surat')
                    ->required(),
                TextInput::make('no_urut')
                    ->required()
                    ->numeric(),
                TextInput::make('no_surat')
                    ->required(),
                TextInput::make('banyak_surat')
                    ->required()
                    ->numeric(),
                Select::make('direktorat_id')
                    ->label('Unit Pengolah')
                    ->relationship('unitPengolah', 'direktorat')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('kode_id')
                    ->label('Kode Surat')
                    ->relationship('kodeSurat', 'kode')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('pengirim')
                    ->required(),
                TextInput::make('perihal')
                    ->required(),
                TextInput::make('kontak_person')
                    ->required(),
                Select::make('sifat_surat_id')
                    ->label('Sifat Surat')
                    ->relationship('sifatSurat', 'sifat_surat')
                    ->searchable()
                    ->preload()
                    ->required(),
                Textarea::make('ringkasan_poko')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('catatan')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('file_upload')
                    ->required(),
                TextInput::make('no_box')
                    ->required(),
                TextInput::make('no_rak')
                    ->required(),
                Toggle::make('kirim_ke_pengarah_surat')
                    ->required(),
            ]);
    }
}
