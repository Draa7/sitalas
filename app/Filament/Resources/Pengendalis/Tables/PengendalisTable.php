<?php

namespace App\Filament\Resources\Pengendalis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;

class PengendalisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                /*TextColumn::make('penerima_id')
                    ->numeric()
                    ->sortable(),*/
                TextColumn::make('tanggal_terima')
                    ->label('Tanggal Masuk')
                    ->date()
                    ->sortable(),
                TextColumn::make('tanggal_surat')
                    ->date()
                    ->sortable(),
                /*TextColumn::make('no_urut')
                    ->numeric()
                    ->sortable(),*/
                TextColumn::make('no_surat')
                    ->searchable(),
                /*TextColumn::make('banyak_surat')
                    ->numeric()
                    ->sortable(),*/
                TextColumn::make('perihal')
                    ->searchable(),
                TextColumn::make('sifatSurat.sifat_surat')
                    ->label('Sifat Surat')
                    ->sortable(),
                TextColumn::make('file_upload')
                    ->label('File upload')
                    ->formatStateUsing(fn ($state) => basename($state))
                    ->url(fn ($record) => route('pengendalis.file.show', ['pengendali' => $record->getKey()]))
                    ->openUrlInNewTab(),
                TextColumn::make('unitPengolah.direktorat')
                    ->label('Unit Pengolah')
                    ->sortable(),
                TextColumn::make('kodeSurat.kode')
                    ->label('Kode Surat')
                    ->sortable(),
                TextColumn::make('kodeSurat.index')
                    ->label('Indeks')
                    ->sortable(),
                /*TextColumn::make('pengirim')
                    ->searchable(),
                
                TextColumn::make('kontak_person')
                    ->searchable(),
                
                TextColumn::make('no_box')
                    ->searchable(),
                TextColumn::make('no_rak')
                    ->searchable(),
                TextColumn::make('status')
                    ->searchable(),
                TextColumn::make('dikirim_pada')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('pengarah_id')
                    ->numeric()
                    ->sortable(),*/
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
            ->actions([
                Action::make('print')
                    ->label('Print')
                    ->icon('heroicon-o-printer')
                    ->url(fn ($record) => route('pengendali.print', $record->id))
                    ->openUrlInNewTab(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
