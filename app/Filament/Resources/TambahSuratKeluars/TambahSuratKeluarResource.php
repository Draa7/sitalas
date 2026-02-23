<?php

namespace App\Filament\Resources\TambahSuratKeluars;

use App\Filament\Resources\TambahSuratKeluars\Pages\CreateTambahSuratKeluar;
use App\Filament\Resources\TambahSuratKeluars\Pages\EditTambahSuratKeluar;
use App\Filament\Resources\TambahSuratKeluars\Pages\ListTambahSuratKeluars;
use App\Filament\Resources\TambahSuratKeluars\Schemas\TambahSuratKeluarForm;
use App\Filament\Resources\TambahSuratKeluars\Tables\TambahSuratKeluarsTable;
use App\Models\TambahSuratKeluar;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Widgets\StatsOverviewWidget\Stat;
use UnitEnum;

class TambahSuratKeluarResource extends Resource
{
    protected static ?string $model = TambahSuratKeluar::class;

    protected static string | UnitEnum | null $navigationGroup= 'Surat Keluar';

    protected static ?string $navigationLabel = 'Tambah';

    #protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'tambah_surat_keluar';

    public static function form(Schema $schema): Schema
    {
        return TambahSuratKeluarForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TambahSuratKeluarsTable::configure($table);
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
            'index' => ListTambahSuratKeluars::route('/'),
            'create' => CreateTambahSuratKeluar::route('/create'),
            'edit' => EditTambahSuratKeluar::route('/{record}/edit'),
        ];
    }
}
