<?php

namespace App\Filament\Resources\SuratMasuks\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use App\Models\KodeSurat;
use Illuminate\Database\Eloquent\Factories\Relationship;

class SuratMasukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('no_surat')
                    ->required(),
                DatePicker::make('tanggal_terima')
                    ->required(),
                DatePicker::make('tanggal_surat')
                    ->required(),
                TextInput::make('no_urut')
                    ->required()
                    ->numeric(),
                TextInput::make('banyak_surat')
                    ->required()
                    ->numeric(),
                Select::make('direktorat_id')
                    ->label('Tujuan')
                    ->relationship('unitPengolah', 'direktorat')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('kode_id')
                    ->label('Kode Surat')
                    ->relationship('kodeSurat', 'kode')
                    ->getOptionLabelFromRecordUsing(fn (KodeSurat $record) =>
                        $record->kode . ' - ' . $record->index
                    )
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
                Textarea::make('ringkasan_pokok')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('catatan')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('upload_file')
                    ->required(),
            ]);
    }
}
