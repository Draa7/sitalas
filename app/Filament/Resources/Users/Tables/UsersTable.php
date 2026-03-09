<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Alamat Email')
                    ->searchable(),

                TextColumn::make('unitPengolah.direktorat')
                    ->label('Direktorat')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('no_hp')
                    ->label('No HP')
                    ->searchable(),

                IconColumn::make('sopd')
                    ->label('SOPD')
                    ->boolean(),

                IconColumn::make('active')
                    ->label('Aktif')
                    ->boolean(),

                TextColumn::make('last_login')
                    ->label('Last Login')
                    ->dateTime('d M y H:i')
                    ->placeholder('-'),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->dateTime('d M y H:i')
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