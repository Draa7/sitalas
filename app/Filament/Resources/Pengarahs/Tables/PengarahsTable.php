<?php

namespace App\Filament\Resources\Pengarahs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PengarahsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('penerima_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tanggal_terima')
                    ->date()
                    ->sortable(),
                TextColumn::make('tanggal_surat')
                    ->date()
                    ->sortable(),
                TextColumn::make('no_urut')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('no_surat')
                    ->searchable(),
                TextColumn::make('banyak_surat')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('direktorat_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('kode_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('pengirim')
                    ->searchable(),
                TextColumn::make('perihal')
                    ->searchable(),
                TextColumn::make('kontak_person')
                    ->searchable(),
                TextColumn::make('sifat_surat_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('file_upload')
                    ->searchable(),
                TextColumn::make('no_box')
                    ->searchable(),
                TextColumn::make('no_rak')
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
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
