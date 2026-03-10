<?php

namespace App\Filament\Pages;

use App\Models\TambahSuratKeluar;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class ReportSuratKeluar extends Page implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Report Surat Keluar';
    protected static ?string $title = 'Report Surat Keluar';
    protected static string | UnitEnum | null $navigationGroup = 'Report';
    protected string $view = 'filament.pages.report-surat-keluar';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'dari_tgl' => null,
            'sampai_tgl' => null,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        DatePicker::make('dari_tgl')
                            ->label('Dari Tanggal')
                            ->native(false)
                            ->live()
                            ->displayFormat('d M Y')
                            ->closeOnDateSelection(),

                        DatePicker::make('sampai_tgl')
                            ->label('Sampai Tanggal')
                            ->native(false)
                            ->live()
                            ->displayFormat('d M Y')
                            ->closeOnDateSelection(),
                    ]),
            ])
            ->statePath('data');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                TextColumn::make('tanggal_surat')
                    ->label('Tgl Surat')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('UnitPengolah.direktorat')
                    ->label('Unit Pengolah')
                    ->wrap(),

                TextColumn::make('no_surat')
                    ->label('No Surat')
                    ->wrap(),

                TextColumn::make('Kode.kode')
                    ->label('Kode'),

                TextColumn::make('perihal')
                    ->label('Perihal')
                    ->wrap()
                    ->limit(50),

                TextColumn::make('kepada')
                    ->label('Kepada')
                    ->wrap(),

                TextColumn::make('Klasifikasi.klasifikasi')
                    ->label('Klasifikasi')
                    ->wrap(),

                TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->wrap()
                    ->limit(40),

                TextColumn::make('lampiran')
                    ->label('Lampiran')
                    ->wrap()
                    ->limit(30),
            ])
            ->defaultSort('tanggal_surat', 'desc')
            ->paginated([10, 25, 50, 100])
            ->searchable(false)
            ->headerActions([
                Action::make('reset_filter')
                    ->label('Reset Filter')
                    ->icon('heroicon-o-arrow-path')
                    ->color('gray')
                    ->action(function () {
                        $this->form->fill([
                            'dari_tgl' => null,
                            'sampai_tgl' => null,
                        ]);
                    }),

                Action::make('print_all')
                    ->label('Print Semua Data')
                    ->icon('heroicon-o-printer')
                    ->color('success')
                    ->url(fn () => route('report.surat-keluar.print', [
                        'dari_tgl' => $this->data['dari_tgl'] ?? null,
                        'sampai_tgl' => $this->data['sampai_tgl'] ?? null,
                    ]))
                    ->openUrlInNewTab(),

                Action::make('export_excel')
                    ->label('Export Excel')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('info')
                    ->url(fn () => route('report.surat-keluar.export', [
                        'dari_tgl' => $this->data['dari_tgl'] ?? null,
                        'sampai_tgl' => $this->data['sampai_tgl'] ?? null,
                    ]))
                    ->openUrlInNewTab(),
            ]);
    }

    protected function getTableQuery(): Builder
    {
        return TambahSuratKeluar::query()
            ->with(['UnitPengolah', 'Klasifikasi', 'Kode'])
            ->when(
                filled($this->data['dari_tgl'] ?? null),
                fn (Builder $query) => $query->whereDate('tanggal_surat', '>=', $this->data['dari_tgl'])
            )
            ->when(
                filled($this->data['sampai_tgl'] ?? null),
                fn (Builder $query) => $query->whereDate('tanggal_surat', '<=', $this->data['sampai_tgl'])
            );
    }
}