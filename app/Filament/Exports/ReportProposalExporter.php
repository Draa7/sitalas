<?php

namespace App\Filament\Exports;

use App\Models\Proposal;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;
use Filament\Actions\Exports\Enums\ExportFormat;

class ReportProposalExporter extends Exporter
{
    protected static ?string $model = Proposal::class;

     public static function getColumns(): array
    {
        return [
            ExportColumn::make('tanggal')
                ->label('Tanggal'),

            ExportColumn::make('no_reg')
                ->label('No Reg'),

            ExportColumn::make('unitPengolah.direktorat')
                ->label('Direktorat'),

            ExportColumn::make('pengirim')
                ->label('Pengirim'),

            ExportColumn::make('perihal')
                ->label('Perihal'),
        ];
    }
    public function getFormats(): array
    {
        return [
            ExportFormat::Xlsx,
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your report proposal export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
