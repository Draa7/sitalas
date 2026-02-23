<?php

namespace App\Filament\Resources\TambahSuratKeluars\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class TambahSuratKeluarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('tanggal_surat')
                    ->required(),
                Select::make('klasifikasi_id')
                    ->label('Klasifikasi Surat')
                    ->relationship('Klasifikasi', 'klasifikasi')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('no_urut')
                    ->required()
                    ->numeric(),
                Select::make('kode_id')
                    ->label('Kode Surat')
                    ->relationship('Kode', 'kode')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('no_surat')
                    ->required(),
                Select::make('sifat_surat_id')
                    ->label('Sifat Surat')
                    ->relationship('Sifat', 'sifat_surat')
                    ->searchable()
                    ->preload()
                    ->required(),
                Textarea::make('perihal')
                    ->required()
                    ->columnSpanFull(),
                Select::make('direktorat_id')
                    ->label('Unit Pengolah')
                    ->relationship('unitPengolah', 'direktorat')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('kontak_person')
                    ->required(),
                TextInput::make('kepada')
                    ->required(),
                Textarea::make('keterangan')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('upload_file')
                    ->required(),
                Textarea::make('lampiran')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
