<?php

namespace App\Filament\Resources\TypeSurats;

use App\Filament\Resources\TypeSurats\Pages\CreateTypeSurat;
use App\Filament\Resources\TypeSurats\Pages\EditTypeSurat;
use App\Filament\Resources\TypeSurats\Pages\ListTypeSurats;
use App\Filament\Resources\TypeSurats\Schemas\TypeSuratForm;
use App\Filament\Resources\TypeSurats\Tables\TypeSuratsTable;
use App\Models\TypeSurat;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TypeSuratResource extends Resource
{
    protected static ?string $model = TypeSurat::class;

    protected static string | UnitEnum | null $navigationGroup = 'Master';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'type_surat';

    public static function form(Schema $schema): Schema
    {
        return TypeSuratForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TypeSuratsTable::configure($table);
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
            'index' => ListTypeSurats::route('/'),
            'create' => CreateTypeSurat::route('/create'),
            'edit' => EditTypeSurat::route('/{record}/edit'),
        ];
    }
}
