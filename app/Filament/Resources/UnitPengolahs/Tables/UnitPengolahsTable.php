<?php

namespace App\Filament\Resources\UnitPengolahs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UnitPengolahsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('direktorat')
                    ->searchable(),
                TextColumn::make('kode_surat')
                    ->searchable(),
                TextColumn::make('urutan')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('no_hp_1')
                    ->searchable(),
                TextColumn::make('no_hp_2')
                    ->searchable(),
                TextColumn::make('no_hp_3')
                    ->searchable(),
                TextColumn::make('no_hp_4')
                    ->searchable(),
                IconColumn::make('bold')
                    ->boolean(),
                IconColumn::make('all_data')
                    ->boolean(),
                IconColumn::make('sekretaris')
                    ->boolean(),
                IconColumn::make('asisten')
                    ->boolean(),
                IconColumn::make('biro')
                    ->boolean(),
                IconColumn::make('sub_biro')
                    ->boolean(),
                IconColumn::make('active')
                    ->boolean(),
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
