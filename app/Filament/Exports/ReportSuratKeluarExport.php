<?php

namespace App\Filament\Exports;

use App\Models\TambahSuratKeluar;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportSuratKeluarExport implements FromCollection, WithHeadings
{
    public function __construct(
        protected ?string $dariTgl = null,
        protected ?string $sampaiTgl = null,
    ) {}

    public function collection(): Collection
    {
        return TambahSuratKeluar::query()
            ->with(['UnitPengolah', 'Klasifikasi', 'Kode'])
            ->when(
                filled($this->dariTgl),
                fn ($query) => $query->whereDate('tanggal_surat', '>=', $this->dariTgl)
            )
            ->when(
                filled($this->sampaiTgl),
                fn ($query) => $query->whereDate('tanggal_surat', '<=', $this->sampaiTgl)
            )
            ->orderBy('tanggal_surat', 'desc')
            ->get()
            ->map(function ($row) {
                return [
                    'tanggal_surat' => $row->tanggal_surat,
                    'unit_pengolah' => $row->UnitPengolah->direktorat ?? '-',
                    'no_surat' => $row->no_surat ?? '-',
                    'kode' => $row->Kode->kode ?? '-',
                    'perihal' => $row->perihal ?? '-',
                    'kepada' => $row->kepada ?? '-',
                    'klasifikasi' => $row->Klasifikasi->klasifikasi ?? '-',
                    'keterangan' => $row->keterangan ?? '-',
                    'lampiran' => $row->lampiran ?? '-',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Tanggal Surat',
            'Unit Pengolah',
            'No Surat',
            'Kode',
            'Perihal',
            'Kepada',
            'Klasifikasi',
            'Keterangan',
            'Lampiran',
        ];
    }
}