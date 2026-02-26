<?php

namespace App\Filament\Resources\Penerimas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PenerimasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tanggal_terima')
                    ->date()
                    ->sortable(),
                TextColumn::make('tanggal_surat')
                    ->date()
                    ->sortable(),
                TextColumn::make('no_urut')
                    ->numeric()
                    ->sortable(),
                /*TextColumn::make('no_surat')
                    ->searchable(),
                TextColumn::make('banyak_surat')
                    ->numeric()
                    ->sortable(),*/
                TextColumn::make('file_upload')
                    ->searchable(),
                TextColumn::make('pengirim')
                    ->searchable(),
                TextColumn::make('perihal')
                    ->searchable(),
                TextColumn::make('unitPengolah.direktorat')
                    ->label('Unit Pengolah')
                    ->sortable(),
                TextColumn::make('kodeSurat.kode')
                    ->label('Kode Surat')
                    ->sortable(),
                
                
                /*TextColumn::make('kontak_person')
                    ->searchable(),
                TextColumn::make('sifatSurat.sifat_surat')
                    ->label('Sifat Surat')
                    ->sortable(),
               
                TextColumn::make('no_box')
                    ->searchable(),
                TextColumn::make('no_rak')
                    ->searchable(),
                IconColumn::make('kirim_ke_pengarah_surat')
                    ->boolean(),*/
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
