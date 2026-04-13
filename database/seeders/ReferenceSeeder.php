<?php

namespace Database\Seeders;

use App\Models\UnitPengolah;
use App\Models\SifatSurat;
use App\Models\Klasifikasi;
use App\Models\KodeSurat;
use Illuminate\Database\Seeder;

class ReferenceSeeder extends Seeder
{
    public function run(): void
    {
        // Sifat Surat
        $sifat = ['Sangat Rahasia', 'Rahasia', 'Penting', 'Biasa'];
        foreach ($sifat as $s) SifatSurat::create(['sifat_surat' => $s]);

        // Klasifikasi
        $klasifikasi = ['Kepegawaian', 'Keuangan', 'Hukum', 'Organisasi', 'Umum'];
        foreach ($klasifikasi as $k) Klasifikasi::create(['klasifikasi' => $k]);

        // Kode Surat
        KodeSurat::create(['kode' => '005', 'index' => 'Undangan', 'tahun' => '2026']);
        KodeSurat::create(['kode' => '800', 'index' => 'Kepegawaian', 'tahun' => '2026']);

        // Unit Pengolah (Master Data untuk User dan Surat)
        UnitPengolah::create(['direktorat' => 'Biro Umum', 'kode_surat' => 'BU', 'biro' => 1]);
        UnitPengolah::create(['direktorat' => 'Biro Hukum', 'kode_surat' => 'BH', 'biro' => 1]);
    }
}