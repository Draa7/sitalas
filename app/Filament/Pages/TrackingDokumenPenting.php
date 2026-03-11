<?php

namespace App\Filament\Pages;

use App\Models\DokumenPenting;
use BackedEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class TrackingDokumenPenting extends Page implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';
    protected string $view = 'filament.pages.tracking-dokumen-penting';
    protected static ?string $navigationLabel = 'Laporan Dokumen Penting';
    protected static ?string $title = 'Laporan Dokumen Penting';
    protected static string|UnitEnum|null $navigationGroup = 'Report';

    public ?string $tanggal_awal = null;
    public ?string $tanggal_akhir = null;

    public function mount(): void
    {
        $this->tanggal_awal = now()->startOfMonth()->toDateString();
        $this->tanggal_akhir = now()->endOfMonth()->toDateString();
    }

    protected function getTableQuery(): Builder
    {
        return DokumenPenting::query()
            ->with('unitPengolah')
            ->when($this->tanggal_awal, fn (Builder $query) =>
                $query->whereDate('tgl_terima', '>=', $this->tanggal_awal)
            )
            ->when($this->tanggal_akhir, fn (Builder $query) =>
                $query->whereDate('tgl_terima', '<=', $this->tanggal_akhir)
            )
            ->latest('tgl_terima');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('tgl_terima')
                ->label('Tgl Masuk')
                ->date('d M Y')
                ->sortable(),

            TextColumn::make('tgl_surat')
                ->label('Tgl Surat')
                ->date('d M Y')
                ->sortable(),

            TextColumn::make('pengirim')
                ->label('Pengirim')
                ->wrap()
                ->searchable(),

            TextColumn::make('unitPengolah.direktorat')
                ->label('Unit Pengolah')
                ->sortable()
                ->searchable()
                ->placeholder('-'),

             TextColumn::make('upload_file')
                ->label('File Upload')
                ->wrap()
                ->searchable(),

            TextColumn::make('perihal')
                ->label('Perihal')
                ->wrap()
                ->limit(50)
                ->tooltip(fn ($record) => $record->perihal),

            TextColumn::make('no_surat')
                ->label('No Surat')
                ->searchable()
                ->wrap(),

            IconColumn::make('kirim_ke_tujuan')
                ->label('Dikirim')
                ->boolean(),
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Action::make('filter')
                ->label('Filter Tanggal')
                ->icon('heroicon-o-funnel')
                ->form([
                    DatePicker::make('tanggal_awal')
                        ->label('Dari Tanggal')
                        ->default($this->tanggal_awal),

                    DatePicker::make('tanggal_akhir')
                        ->label('Sampai Tanggal')
                        ->default($this->tanggal_akhir),
                ])
                ->action(function (array $data): void {
                    $this->tanggal_awal = $data['tanggal_awal'] ?? null;
                    $this->tanggal_akhir = $data['tanggal_akhir'] ?? null;
                    $this->resetTable();
                }),

            Action::make('resetFilter')
                ->label('Reset')
                ->color('gray')
                ->icon('heroicon-o-arrow-path')
                ->action(function (): void {
                    $this->tanggal_awal = null;
                    $this->tanggal_akhir = null;
                    $this->resetTable();
                }),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('detail')
                ->label('Detail')
                ->icon('heroicon-o-eye')
                ->modalHeading('Detail Dokumen Penting')
                ->modalContent(fn ($record) => view('filament.pages.partials.detail-dokumen-penting', [
                    'record' => $record,
                ])),
        ];
    }

    protected function getTableDefaultPaginationPageOption(): int|string|null
    {
        return 10;
    }

    protected function getTablePaginationPageOptions(): array
    {
        return [10, 25, 50, 100];
    }
}