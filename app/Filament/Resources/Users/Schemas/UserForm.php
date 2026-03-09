<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),

                TextInput::make('email')
                    ->label('Alamat Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('password')
                    ->label('Kata Sandi')
                    ->password()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->dehydrated(fn ($state): bool => filled($state)),

                Select::make('direktorat_id')
                    ->label('Direktorat')
                    ->relationship('unitPengolah', 'direktorat')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                FileUpload::make('file_ttd')
                    ->label('File Tanda Tangan')
                    ->directory('ttd')
                    ->image()
                    ->maxSize(2048),

                TextInput::make('no_hp')
                    ->label('No HP')
                    ->maxLength(20),

                Toggle::make('sopd')
                    ->label('User SOPD')
                    ->default(false),

                Toggle::make('active')
                    ->label('Aktif')
                    ->default(true)
                    ->required(),
            ]);
    }
}