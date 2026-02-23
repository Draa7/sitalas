<?php

namespace App\Filament\Resources\TambahSuratKeluars\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TambahSuratKeluarsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tanggal_surat')
                    ->date()
                    ->sortable(),
                TextColumn::make('klasifikasi_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('no_urut')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('kode_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('no_surat')
                    ->searchable(),
                TextColumn::make('sifat_surat_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('direktorat_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('kontak_person')
                    ->searchable(),
                TextColumn::make('kepada')
                    ->searchable(),
                TextColumn::make('upload_file')
                    ->searchable(),
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
