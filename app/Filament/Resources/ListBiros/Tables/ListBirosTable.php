<?php

namespace App\Filament\Resources\ListBiros\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ListBirosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_urut')
                    ->date()
                    ->sortable(),

                TextColumn::make('tanggal_surat')
                    ->date()
                    ->sortable(),

                TextColumn::make('UnitPengolah.direktorat')
                    ->label('Unit Pengolah')
                    ->sortable(),

                TextColumn::make('no_surat')
                    ->label('No Surat')
                    ->sortable(),

                TextColumn::make('perihal')
                    ->label('Perihal')
                    ->searchable(),

                TextColumn::make('kepada')
                    ->label('Nama')
                    ->searchable(),

                 TextColumn::make('Klasifikasi.klasifikasi')
                    ->label('Klasifikasi')
                    ->sortable(),

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
