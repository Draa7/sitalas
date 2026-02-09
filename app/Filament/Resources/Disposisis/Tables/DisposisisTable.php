<?php

namespace App\Filament\Resources\Disposisis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class DisposisisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                 Tables\Columns\TextColumn::make('jenis_disposisi')->searchable(),
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
