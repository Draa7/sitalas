<?php

namespace App\Http\Controllers;

use App\Filament\Exports\ReportSuratKeluarExport;
use App\Models\TambahSuratKeluar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportSuratKeluarController extends Controller
{
    public function print(Request $request)
    {
        $filters = $this->getFilters($request);

        $records = $this->getFilteredQuery($filters)
            ->orderBy('tanggal_surat', 'desc')
            ->get();

        return view('reports.surat-keluar-print', [
            'records' => $records,
            'dari_tgl' => $filters['dari_tgl'],
            'sampai_tgl' => $filters['sampai_tgl'],
        ]);
    }

    public function export(Request $request)
    {
        $filters = $this->getFilters($request);

        $filename = 'report-surat-keluar';

        if ($filters['dari_tgl'] || $filters['sampai_tgl']) {
            $filename .= '-' . ($filters['dari_tgl'] ?: 'awal');
            $filename .= '-sd-' . ($filters['sampai_tgl'] ?: 'akhir');
        }

        $filename .= '.xlsx';

        return Excel::download(
            new ReportSuratKeluarExport(
                $filters['dari_tgl'],
                $filters['sampai_tgl'],
            ),
            $filename
        );
    }

    protected function getFilters(Request $request): array
    {
        return [
            'dari_tgl' => $request->filled('dari_tgl') ? $request->string('dari_tgl')->value() : null,
            'sampai_tgl' => $request->filled('sampai_tgl') ? $request->string('sampai_tgl')->value() : null,
        ];
    }

    protected function getFilteredQuery(array $filters): Builder
    {
        return TambahSuratKeluar::query()
            ->with(['UnitPengolah', 'Klasifikasi', 'Kode'])
            ->when(
                filled($filters['dari_tgl']),
                fn (Builder $query) => $query->whereDate('tanggal_surat', '>=', $filters['dari_tgl'])
            )
            ->when(
                filled($filters['sampai_tgl']),
                fn (Builder $query) => $query->whereDate('tanggal_surat', '<=', $filters['sampai_tgl'])
            );
    }
}