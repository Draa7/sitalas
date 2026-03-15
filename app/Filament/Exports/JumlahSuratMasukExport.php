<?php

namespace App\Filament\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Events\AfterSheet;

class JumlahSuratMasukExport implements
    FromCollection,
    WithHeadings,
    ShouldAutoSize,
    WithEvents
{
    protected $data;
    protected $tanggalDari;
    protected $tanggalSampai;

    public function __construct(Collection $data, $tanggalDari, $tanggalSampai)
    {
        $this->data = $data;
        $this->tanggalDari = $tanggalDari;
        $this->tanggalSampai = $tanggalSampai;
    }

    public function collection()
    {
        return $this->data->map(function ($row) {
            return [
                'direktorat' => $row->direktorat,
                'jumlah_surat' => $row->jumlah_surat,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Direktorat',
            'Jumlah Surat'
        ];
    }

    public function registerEvents(): array
    {
        return [

            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();

                $rowCount = $this->data->count() + 1;

                /*
                TITLE
                */

                $sheet->insertNewRowBefore(1, 3);

                $sheet->mergeCells('A1:B1');
                $sheet->mergeCells('A2:B2');

                $sheet->setCellValue('A1', 'REPORT JUMLAH SURAT MASUK');

                $sheet->setCellValue(
                    'A2',
                    'Periode : ' .
                    date('d M Y', strtotime($this->tanggalDari)) .
                    ' - ' .
                    date('d M Y', strtotime($this->tanggalSampai))
                );

                $sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 16
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER
                    ]
                ]);

                $sheet->getStyle('A2')->applyFromArray([
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER
                    ]
                ]);

                /*
                HEADER STYLE
                */

                $headerRow = 4;
                $lastRow = $rowCount + 3;

                $sheet->getStyle("A{$headerRow}:B{$headerRow}")
                    ->applyFromArray([
                        'font' => [
                            'bold' => true,
                            'color' => ['rgb' => 'FFFFFF']
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_CENTER
                        ],
                        'fill' => [
                            'fillType' => Fill::FILL_SOLID,
                            'startColor' => ['rgb' => '16A34A']
                        ]
                    ]);

                /*
                BORDER TABLE
                */

                $sheet->getStyle("A{$headerRow}:B{$lastRow}")
                    ->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN
                            ]
                        ]
                    ]);

                /*
                ALIGN NUMBER
                */

                $sheet->getStyle("B".($headerRow+1).":B{$lastRow}")
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

                /*
                TOTAL
                */

                $total = $this->data->sum('jumlah_surat');

                $totalRow = $lastRow + 2;

                $sheet->setCellValue("A{$totalRow}", 'TOTAL SURAT :');
                $sheet->setCellValue("B{$totalRow}", $total);

                $sheet->getStyle("A{$totalRow}:B{$totalRow}")
                    ->applyFromArray([
                        'font' => ['bold' => true]
                    ]);

            }

        ];
    }
}