<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lembar Pengendali</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12px;
            margin: 40px;
        }

        .kop {
            text-align: center;
        }

        .kop h2 {
            margin: 0;
            font-size: 16px;
            text-transform: uppercase;
        }

        .kop p {
            margin: 2px 0;
            font-size: 12px;
        }

        .line {
            border-top: 3px solid black;
            border-bottom: 1px solid black;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .judul {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 20px;
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 6px;
            vertical-align: top;
        }

        .label {
            width: 25%;
            font-weight: bold;
        }

        .titik {
            width: 5%;
        }

        .isi {
            width: 70%;
        }

        .box {
            border: 1px solid black;
            padding: 10px;
            margin-top: 10px;
        }

        .ttd {
            margin-top: 60px;
            width: 100%;
        }

        .ttd td {
            text-align: center;
        }

        .small {
            font-size: 11px;
        }
    </style>
</head>
<body>

    {{-- ================= KOP SURAT ================= --}}
    <div class="kop">
        <h2>PEMERINTAH PROVINSI JAWA BARAT</h2>
        <p>Alamat Jl. Diponegoro No.22, Kel. Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115</p>
        <p>082228886531 | ppidbiroumum@jabarprov.go.id | https://sisminda.rajakon.co.id</p>
    </div>

    <div class="line"></div>

    {{-- ================= JUDUL ================= --}}
    <div class="judul">
        KARTU KENDALI SURAT MASUK
    </div>

    {{-- ================= DATA UTAMA ================= --}}
    <table>
        <tr>
            <td class="label">Index</td>
            <td class="titik">:</td>
            <td class="isi">{{ $data->kodeSurat->index ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Kode</td>
            <td>:</td>
            <td>{{ $data->kodeSurat->kode ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">No. Urut</td>
            <td>:</td>
            <td>{{ $data->no_urut }}</td>
        </tr>

        <tr>
            <td class="label">Nomor Surat</td>
            <td>:</td>
            <td>{{ $data->no_surat }}</td>
        </tr>

        <tr>
            <td class="label">Tanggal Surat</td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($data->tanggal_surat)->format('d F Y') }}</td>
        </tr>

        <tr>
            <td class="label">Tanggal Terima</td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($data->tanggal_terima)->format('d F Y') }}</td>
        </tr>

        <tr>
            <td class="label">Pengirim</td>
            <td>:</td>
            <td>{{ $data->pengirim }}</td>
        </tr>

        <tr>
            <td class="label">Direktorat</td>
            <td>:</td>
            <td>{{ $data->unitPengolah->direktorat ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Banyak Surat</td>
            <td>:</td>
            <td>{{ $data->banyak_surat }}</td>
        </tr>
    </table>

    {{-- ================= PERIHAL ================= --}}
    <div class="box">
        <strong>Perihal:</strong><br>
        {{ $data->perihal }}
    </div>

    {{-- ================= RINGKASAN ================= --}}
    <div class="box">
        <strong>Ringkasan Pokok:</strong><br>
        {{ $data->ringkasan_poko }}
    </div>

    {{-- ================= CATATAN ================= --}}
    <div class="box">
        <strong>Catatan:</strong><br>
        {{ $data->catatan ?? '-' }}
    </div>

    {{-- ================= TANDA TANGAN ================= --}}
    <table class="ttd">
        <tr>
            <td>
                Mengetahui,<br>
                <br><br><br>
                ___________________________
            </td>
            <td>
                Tanda Terima,<br>
                <br><br><br>
                ___________________________
            </td>
        </tr>
    </table>

</body>
</html>