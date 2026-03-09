<?php

namespace App\Filament\Resources\SopdUsers;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SopdUsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Username / Email')
                    ->searchable(),

                TextColumn::make('unitPengolah.direktorat')
                    ->label('Direktorat')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('no_hp')
                    ->label('No HP')
                    ->searchable()
                    ->placeholder('-'),

                TextColumn::make('last_login')
                    ->label('Last Login')
                    ->dateTime('d M y H:i')
                    ->placeholder('-'),

                IconColumn::make('active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->recordActions([
                EditAction::make()
                    ->url(fn ($record) => UserResource::getUrl('edit', ['record' => $record])),
            ]);
    }
}