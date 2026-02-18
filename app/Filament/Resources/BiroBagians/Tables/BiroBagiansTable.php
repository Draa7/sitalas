<?php

namespace App\Filament\Resources\BiroBagians\Tables;

use App\Models\AsistenBiro;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class BiroBagiansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('biroUnit.direktorat')
                ->label('Biro')
                ->searchable(),
                TextColumn::make('subBiro.direktorat')
                ->label('Bagian')
                ->searchable(),
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
