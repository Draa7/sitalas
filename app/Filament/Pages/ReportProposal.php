<?php

namespace App\Filament\Pages;

use App\Models\Proposal;
use App\Models\User;
use App\Models\UnitPengolah;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Tables\Table;
use Filament\Actions\Action;
use UnitEnum;
use Filament\Actions\ExportAction;
use App\Filament\Exports\ReportProposalExporter;
use Filament\Notifications\Notification;
use Filament\Actions\Exports\Models\Export;

class ReportProposal extends Page implements
    Forms\Contracts\HasForms,
    Tables\Contracts\HasTable
{
    use Forms\Concerns\InteractsWithForms;
    use Tables\Concerns\InteractsWithTable;

     protected static string | UnitEnum | null $navigationGroup = 'Proposal';
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'Report Proposal';

    protected string $view = 'filament.pages.report-proposal';

    public ?string $date_from = null;
    public ?string $date_to = null;
    public ?int $direktorat_id = null;

    public function mount(): void
    {
        $this->date_from = now()->startOfMonth()->toDateString();
        $this->date_to = now()->toDateString();
    }

        public function form(Schema $schema): Schema
{
    return $schema
        ->statePath('')
        ->schema([
            Grid::make(12)->schema([
                Forms\Components\DatePicker::make('date_from')
                    ->label('Dari Tanggal')
                    ->columnSpan(3)
                    ->live(debounce: 500),

                Forms\Components\DatePicker::make('date_to')
                    ->label('Sampai Tanggal')
                    ->columnSpan(3)
                    ->live(debounce: 500),

                Forms\Components\Select::make('direktorat_id')
                    ->label('Direktorat')
                    ->options(fn () => UnitPengolah::query()->pluck('direktorat', 'id')->toArray())
                    ->searchable()
                    ->preload()
                    ->columnSpan(6)
                    ->live(debounce: 500),
            ]),
        ]);
}

    public function refreshTable(): void
    {
        $this->resetTablePagination();
    }

    protected function getTableQuery(): Builder
    {
    return Proposal::query()
        ->with(['unitPengolah:id,direktorat']) // batasi kolom relasi
        ->when($this->date_from, fn ($q) => $q->where('tanggal', '>=', $this->date_from))
        ->when($this->date_to, fn ($q) => $q->where('tanggal', '<=', $this->date_to))
        ->when($this->direktorat_id, fn ($q) => $q->where('direktorat_id', $this->direktorat_id));
    }

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tgl')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('no_reg')
                    ->label('No Reg')
                    ->searchable(),

                Tables\Columns\TextColumn::make('unitPengolah.direktorat')
                    ->label('Direktorat'),

                Tables\Columns\TextColumn::make('pengirim')
                    ->searchable(),

                Tables\Columns\TextColumn::make('perihal')
                    ->wrap()
                    ->searchable(),
            ])
            ->defaultSort('tanggal', 'desc')
            ->headerActions([
               ExportAction::make('export')
                    ->label('Excel')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->exporter(\App\Filament\Exports\ReportProposalExporter::class)
                    ->after(function () {
                        Notification::make()
                            ->title('Export completed')
                            ->body('File Excel sudah siap di-download.')
                            ->success()
                            ->sendToDatabase(auth()->user());
                    }),

                Action::make('print')
                    ->label('Print')
                    ->icon('heroicon-o-printer')
                    ->url(fn () => route('report.proposal.print', [
                        'date_from' => $this->date_from,
                        'date_to' => $this->date_to,
                        'direktorat_id' => $this->direktorat_id,
                    ]))
                    ->openUrlInNewTab(),
            ]);
    }
}