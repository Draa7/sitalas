<?php

namespace App\Filament\Pages;

use App\Models\UnitPengolah;
use BackedEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class JumlahSuratMasuk extends Page implements HasForms, HasTable
{
    use \Filament\Forms\Concerns\InteractsWithForms;
    use \Filament\Tables\Concerns\InteractsWithTable;

    protected static string |BackedEnum| null $navigationIcon = 'heroicon-o-document-chart-bar';
    protected static ?string $navigationLabel = 'Jumlah Surat Masuk';
    protected static ?string $title = 'Report Jumlah Surat Masuk';
    protected static ?string $slug = 'report-jumlah-surat-masuk';
    protected static string |UnitEnum| null $navigationGroup = 'Report';

    protected string $view = 'filament.pages.jumlah-surat-masuk';

    public ?string $tanggal_dari = null;
    public ?string $tanggal_sampai = null;

    public function mount(): void
    {
        $this->tanggal_dari = '2015-03-01';
        $this->tanggal_sampai = now()->toDateString();
        $this->form->fill([
            'tanggal_dari' => $this->tanggal_dari,
            'tanggal_sampai' => $this->tanggal_sampai,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Filter Tanggal')
                    ->schema([
                        DatePicker::make('tanggal_dari')
                            ->label('Dari Tanggal')
                            ->live(),
                        DatePicker::make('tanggal_sampai')
                            ->label('Sampai Tanggal')
                            ->live(),
                    ])
                    ->columns(2),
            ])
            ->statePath('');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->defaultSort('urutan')
            ->paginated(false)
            ->columns([
                Tables\Columns\TextColumn::make('direktorat')
                    ->label('Direktorat')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jumlah_surat')
                    ->label('Jumlah Surat')
                    ->alignCenter()
                    ->sortable(),
            ]);
    }

    protected function getTableQuery(): Builder
    {
        return UnitPengolah::query()
            ->select('unit_pengolahs.*')
            ->withCount([
                'Penerima as jumlah_surat' => function ($query) {
                    $query
                        ->when(
                            $this->tanggal_dari,
                            fn ($q) => $q->whereDate('tanggal_terima', '>=', $this->tanggal_dari)
                        )
                        ->when(
                            $this->tanggal_sampai,
                            fn ($q) => $q->whereDate('tanggal_terima', '<=', $this->tanggal_sampai)
                        );
                },
            ]);
    }
}