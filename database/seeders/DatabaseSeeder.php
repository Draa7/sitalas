<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // URUTAN SANGAT PENTING:
        // 1. Data referensi dulu (karena dibutuhkan oleh User dan Surat)
        $this->call(ReferenceSeeder::class);

        // 2. Baru jalankan UserSeeder (pastikan UserSeeder sudah mengarah ke direktorat_id yang ada)
        $this->call(UserSeeder::class);

        // 3. Terakhir data transaksi (Surat)
        $this->call(SuratSeeder::class);
    }
}