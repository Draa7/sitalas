<?php

namespace App\Filament\Resources\SifatSurats;

use App\Filament\Resources\SifatSurats\Pages\CreateSifatSurat;
use App\Filament\Resources\SifatSurats\Pages\EditSifatSurat;
use App\Filament\Resources\SifatSurats\Pages\ListSifatSurats;
use App\Filament\Resources\SifatSurats\Schemas\SifatSuratForm;
use App\Filament\Resources\SifatSurats\Tables\SifatSuratsTable;
use App\Models\SifatSurat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SifatSuratResource extends Resource
{
    protected static ?string $model = SifatSurat::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-inbox';

    protected static ?string $recordTitleAttribute = 'sifat_surat';

    public static function form(Schema $schema): Schema
    {
        return SifatSuratForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SifatSuratsTable::configure($table);
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
            'index' => ListSifatSurats::route('/'),
            'create' => CreateSifatSurat::route('/create'),
            'edit' => EditSifatSurat::route('/{record}/edit'),
        ];
    }
}
