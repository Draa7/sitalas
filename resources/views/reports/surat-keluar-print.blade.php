<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Report Surat Keluar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
        }

        .filter-info {
            margin-bottom: 15px;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: top;
            word-break: break-word;
        }

        th {
            background: #f0f0f0;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        .no-print {
            margin-bottom: 15px;
        }

        @media print {
            .no-print {
                display: none;
            }

            @page {
                size: landscape;
                margin: 10mm;
            }

            body {
                font-size: 10px;
            }

            th, td {
                padding: 4px;
            }
        }
    </style>
</head>
<body>
    <div class="no-print">
        <button onclick="window.print()">Print</button>
    </div>

    <div class="header">
        <h2>REPORT SURAT KELUAR</h2>
    </div>

    <div class="filter-info">
        <div><strong>Dari Tanggal:</strong> {{ $dari_tgl ?: '-' }}</div>
        <div><strong>Sampai Tanggal:</strong> {{ $sampai_tgl ?: '-' }}</div>
        <div><strong>Jumlah Data:</strong> {{ $records->count() }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 8%">Tgl Surat</th>
                <th style="width: 14%">Unit Pengolah</th>
                <th style="width: 12%">No Surat</th>
                <th style="width: 8%">Kode</th>
                <th style="width: 18%">Perihal</th>
                <th style="width: 12%">Kepada</th>
                <th style="width: 10%">Klasifikasi</th>
                <th style="width: 10%">Keterangan</th>
                <th style="width: 8%">Lampiran</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($records as $row)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($row->tanggal_surat)->format('d M Y') }}</td>
                    <td>{{ $row->UnitPengolah->direktorat ?? '-' }}</td>
                    <td>{{ $row->no_surat ?? '-' }}</td>
                    <td>{{ $row->Kode->kode ?? '-' }}</td>
                    <td>{{ $row->perihal ?? '-' }}</td>
                    <td>{{ $row->kepada ?? '-' }}</td>
                    <td>{{ $row->Klasifikasi->klasifikasi ?? '-' }}</td>
                    <td>{{ $row->keterangan ?? '-' }}</td>
                    <td>{{ $row->lampiran ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data untuk dicetak.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <script>
        window.onload = function () {
            window.print();
        };
    </script>
</body>
</html>