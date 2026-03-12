<?php

namespace App\Filament\Pages;

use App\Models\UnitPengolah;
use BackedEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class JumlahSuratMasuk extends Page implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-document-chart-bar';
    protected static ?string $navigationLabel = 'Jumlah Surat Masuk';
    protected static ?string $title = 'Report Jumlah Surat Masuk';
    protected static ?string $slug = 'report-jumlah-surat-masuk';
    protected static string | UnitEnum | null $navigationGroup = 'Report';

    protected string $view = 'filament.pages.jumlah-surat-masuk';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => $this->getTableQuery())
            ->columns([
                Tables\Columns\TextColumn::make('direktorat')
                    ->label('Direktorat')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jumlah_surat')
                    ->label('Jumlah Surat')
                    ->alignCenter()
                    ->sortable(),
            ])
            ->defaultSort('urutan')
            ->striped()
            ->paginated(false)
            ->filters([
                Filter::make('tanggal')
                    ->label('Filter Tanggal')
                    ->schema([
                        DatePicker::make('tanggal_dari')
                            ->label('Dari Tanggal')
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->placeholder('Pilih tanggal'),

                        DatePicker::make('tanggal_sampai')
                            ->label('Sampai Tanggal')
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->placeholder('Pilih tanggal'),
                    ])
                    ->columns(2),
            ])
            ->filtersFormColumns(1)
            ->emptyStateHeading('Belum ada data')
            ->emptyStateDescription('Pilih rentang tanggal dari tombol filter lalu klik Apply filters.');
    }

    protected function getTableQuery(): Builder
    {
        $tanggalDari = data_get($this->tableFilters, 'tanggal.tanggal_dari');
        $tanggalSampai = data_get($this->tableFilters, 'tanggal.tanggal_sampai');

        $query = UnitPengolah::query()
            ->select('unit_pengolahs.*');

        if (blank($tanggalDari) || blank($tanggalSampai)) {
            return $query->whereRaw('1 = 0');
        }

        return $query->withCount([
            'Penerima as jumlah_surat' => function ($query) use ($tanggalDari, $tanggalSampai) {
                $query
                    ->when(
                        $tanggalDari,
                        fn ($q) => $q->whereDate('tanggal_terima', '>=', $tanggalDari)
                    )
                    ->when(
                        $tanggalSampai,
                        fn ($q) => $q->whereDate('tanggal_terima', '<=', $tanggalSampai)
                    );
            },
        ]);
    }
}