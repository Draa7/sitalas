<?php

namespace App\Filament\Resources\Pengarahs;

use App\Filament\Resources\Pengarahs\Pages\CreatePengarah;
use App\Filament\Resources\Pengarahs\Pages\EditPengarah;
use App\Filament\Resources\Pengarahs\Pages\ListPengarahs;
use App\Filament\Resources\Pengarahs\Pages\ViewPengarah;
use App\Filament\Resources\Pengarahs\Schemas\PengarahForm;
use App\Filament\Resources\Pengarahs\Schemas\PengarahInfolist;
use App\Filament\Resources\Pengarahs\Tables\PengarahsTable;
use App\Models\Pengarah;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PengarahResource extends Resource
{
    protected static ?string $model = Pengarah::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'pengarah';

    public static function form(Schema $schema): Schema
    {
        return PengarahForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PengarahInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PengarahsTable::configure($table);
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
            'index' => ListPengarahs::route('/'),
            'create' => CreatePengarah::route('/create'),
            'view' => ViewPengarah::route('/{record}'),
            'edit' => EditPengarah::route('/{record}/edit'),
        ];
    }
}
