<?php

namespace App\Filament\Resources\KodeSurats;

use App\Filament\Resources\KodeSurats\Pages\CreateKodeSurat;
use App\Filament\Resources\KodeSurats\Pages\EditKodeSurat;
use App\Filament\Resources\KodeSurats\Pages\ListKodeSurats;
use App\Filament\Resources\KodeSurats\Schemas\KodeSuratForm;
use App\Filament\Resources\KodeSurats\Tables\KodeSuratsTable;
use App\Models\KodeSurat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KodeSuratResource extends Resource
{
    protected static ?string $model = KodeSurat::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $recordTitleAttribute = 'kode_surat';

    public static function form(Schema $schema): Schema
    {
        return KodeSuratForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KodeSuratsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKodeSurats::route('/'),
            'create' => CreateKodeSurat::route('/create'),
            'edit' => EditKodeSurat::route('/{record}/edit'),
        ];
    }
}
