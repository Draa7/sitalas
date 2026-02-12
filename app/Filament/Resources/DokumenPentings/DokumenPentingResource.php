<?php

namespace App\Filament\Resources\DokumenPentings;

use App\Filament\Resources\DokumenPentings\Pages\CreateDokumenPenting;
use App\Filament\Resources\DokumenPentings\Pages\EditDokumenPenting;
use App\Filament\Resources\DokumenPentings\Pages\ListDokumenPentings;
use App\Filament\Resources\DokumenPentings\Schemas\DokumenPentingForm;
use App\Filament\Resources\DokumenPentings\Tables\DokumenPentingsTable;
use App\Models\DokumenPenting;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DokumenPentingResource extends Resource
{
    protected static ?string $model = DokumenPenting::class;

    protected static string | UnitEnum | null $navigationGroup = 'Dokumen Penting';

     protected static ?string $navigationLabel = 'Dokumen Penting';


    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document';

    protected static ?string $recordTitleAttribute = 'dokumen_penting';

    public static function form(Schema $schema): Schema
    {
        return DokumenPentingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DokumenPentingsTable::configure($table);
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
            'index' => ListDokumenPentings::route('/'),
            'create' => CreateDokumenPenting::route('/create'),
            'edit' => EditDokumenPenting::route('/{record}/edit'),
        ];
    }
}
