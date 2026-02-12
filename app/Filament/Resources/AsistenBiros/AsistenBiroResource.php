<?php

namespace App\Filament\Resources\AsistenBiros;

use App\Filament\Resources\AsistenBiros\Pages\CreateAsistenBiro;
use App\Filament\Resources\AsistenBiros\Pages\EditAsistenBiro;
use App\Filament\Resources\AsistenBiros\Pages\ListAsistenBiros;
use App\Filament\Resources\AsistenBiros\Schemas\AsistenBiroForm;
use App\Filament\Resources\AsistenBiros\Tables\AsistenBirosTable;
use App\Models\AsistenBiro;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AsistenBiroResource extends Resource
{
    protected static ?string $model = AsistenBiro::class;

    protected static string | UnitEnum | null $navigationGroup = 'Master';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'asisten_biro';

    public static function form(Schema $schema): Schema
    {
        return AsistenBiroForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AsistenBirosTable::configure($table);
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
            'index' => ListAsistenBiros::route('/'),
            'create' => CreateAsistenBiro::route('/create'),
            'edit' => EditAsistenBiro::route('/{record}/edit'),
        ];
    }
}
