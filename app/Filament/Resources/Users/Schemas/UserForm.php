<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(),
                Toggle::make('active')
                    ->required(),
                DateTimePicker::make('last_login'),
                TextInput::make('tlsk'),
                TextInput::make('direktorat_id')
                    ->numeric(),
                FileUpload::make('file_ttd')
                    ->label('File Tanda Tangan')
                    ->directory('ttd')
                    ->image()
                    ->maxSize(2048),
                TextInput::make('sopd'),
                TextInput::make('no_hp'),
            ]);
    }
}
