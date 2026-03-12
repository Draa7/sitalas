<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lembar Pengendali</title>

    <style>
        @page {
            margin: 18px 22px;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
            color: #000;
        }

        .kop {
            text-align: center;
            font-family: "Times New Roman", serif;
            margin-bottom: 8px;
        }

        .kop h2 {
            margin: 0;
            font-size: 16px;
            text-transform: uppercase;
        }

        .kop p {
            margin: 1px 0;
            font-size: 12px;
        }

        .line {
            border-top: 3px solid #000;
            border-bottom: 1px solid #000;
            margin-top: 8px;
            margin-bottom: 10px;
        }

        .judul-surat {
            text-align: center;
            font-weight: bold;
            font-size: 13px;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        table.form {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        table.form td {
            padding: 4px 6px;
            vertical-align: top;
            word-break: break-word;
        }

        .btop { border-top: 1px solid #000; }
        .bbot { border-bottom: 1px solid #000; }
        .bleft { border-left: 1px solid #000; }
        .bright { border-right: 1px solid #000; }

        .bold { font-weight: bold; }

        .label {
            width: 90px;
            white-space: nowrap;
        }

        .colon {
            width: 10px;
            text-align: center;
        }

        .value {
            width: auto;
        }

        .height-ringkas {
            min-height: 72px;
            line-height: 1.35;
        }

        .height-catatan {
            min-height: 42px;
            line-height: 1.35;
        }

        .no-padding {
            padding: 0 !important;
        }

        .inner-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .inner-table td {
            padding: 4px 6px;
            vertical-align: top;
        }

        .ttd-box {
            min-height: 28px;
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

    {{-- ================= JUDUL DI BAWAH KOP ================= --}}
    <div class="judul-surat">
        KARTU KENDALI SURAT MASUK
    </div>

    {{-- ================= ISI FORM ================= --}}
    <table class="form">
        <tr>
            <td class="label">Index</td>
            <td class="colon">:</td>
            <td class="value bright">{{ $data->kodeSurat->index ?? '-' }}</td>

            <td class="label">Kode</td>
            <td class="colon">:</td>
            <td class="value bright">{{ $data->kodeSurat->kode ?? '-' }}</td>

            <td class="label">No. Urut</td>
            <td class="colon">:</td>
            <td class="value">{{ $data->no_urut ?? '-' }}</td>
        </tr>

        <tr class="btop bbot">
            <td class="label">Hal</td>
            <td class="colon">:</td>
            <td colspan="7">
                {{ $data->perihal ?? '-' }}
            </td>
        </tr>

        <tr class="bbot">
            <td class="label">Isi Ringkasan</td>
            <td class="colon">:</td>
            <td colspan="7">
                <div class="height-ringkas">
                    {{ $data->ringkasan_poko ?? '-' }}
                </div>
            </td>
        </tr>

        <tr class="bbot">
            <td class="label">Dari</td>
            <td class="colon">:</td>
            <td colspan="7">
                {{ $data->pengirim ?? '-' }}
            </td>
        </tr>

        <tr class="bbot">
            <td colspan="9" class="no-padding">
                <table class="inner-table">
                    <tr>
                        <td style="width:16%;" class="bright">
                            <span class="bold">Tanggal Surat :</span><br>
                            {{ !empty($data->tanggal_surat) ? \Carbon\Carbon::parse($data->tanggal_surat)->format('d-F-Y') : '-' }}
                        </td>
                        <td style="width:26%;" class="bright">
                            <span class="bold">Nomor Surat :</span><br>
                            {{ $data->no_surat ?? '-' }}
                        </td>
                        <td style="width:8%;">
                            <span class="bold">Lampiran :</span><br>
                            {{ $data->banyak_surat ?? '1' }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="bbot">
            <td colspan="9" class="no-padding">
                <table class="inner-table">
                    <tr>
                        <td style="width:34%;" class="bright">
                            <span class="bold">Pengolah :</span><br>
                            {{ $data->unitPengolah->direktorat ?? '-' }}
                        </td>
                        <td style="width:26%;" class="bright">
                            <span class="bold">Tanggal Diteruskan :</span><br>
                            {{ !empty($data->tanggal_terima) ? \Carbon\Carbon::parse($data->tanggal_terima)->format('d-F-Y') : '-' }}
                        </td>
                        <td style="width:20%;">
                            <span class="bold">Tanda Terima :</span><br>
                            <div class="ttd-box">&nbsp;</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="bbot">
            <td class="label">Catatan</td>
            <td class="colon">:</td>
            <td colspan="7">
                <div class="height-catatan">
                    {{ $data->catatan ?? '-' }}
                </div>
            </td>
        </tr>
    </table>

</body>
</html>