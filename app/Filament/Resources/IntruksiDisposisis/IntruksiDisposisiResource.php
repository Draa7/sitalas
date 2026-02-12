<?php

namespace App\Filament\Resources\IntruksiDisposisis;

use App\Filament\Resources\IntruksiDisposisis\Pages\CreateIntruksiDisposisi;
use App\Filament\Resources\IntruksiDisposisis\Pages\EditIntruksiDisposisi;
use App\Filament\Resources\IntruksiDisposisis\Pages\ListIntruksiDisposisis;
use App\Filament\Resources\IntruksiDisposisis\Schemas\IntruksiDisposisiForm;
use App\Filament\Resources\IntruksiDisposisis\Tables\IntruksiDisposisisTable;
use App\Models\IntruksiDisposisi;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IntruksiDisposisiResource extends Resource
{
    protected static ?string $model = IntruksiDisposisi::class;

    protected static string | UnitEnum | null $navigationGroup = 'Master';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'intruksi_disposisi';

    public static function form(Schema $schema): Schema
    {
        return IntruksiDisposisiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IntruksiDisposisisTable::configure($table);
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
            'index' => ListIntruksiDisposisis::route('/'),
            'create' => CreateIntruksiDisposisi::route('/create'),
            'edit' => EditIntruksiDisposisi::route('/{record}/edit'),
        ];
    }
}
