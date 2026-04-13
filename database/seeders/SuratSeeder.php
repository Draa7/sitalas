<?php

namespace Database\Seeders;

use App\Models\Penerima;
use App\Models\TambahSuratKeluar;
use App\Models\User;
use App\Models\UnitPengolah;
use App\Models\KodeSurat;
use App\Models\SifatSurat;
use App\Models\Klasifikasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class SuratSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Menggunakan lokalisasi Indonesia

        // Ambil ID yang tersedia agar tidak terjadi error foreign key
        $unitIds = UnitPengolah::pluck('id')->toArray();
        $kodeIds = KodeSurat::pluck('id')->toArray();
        $sifatIds = SifatSurat::pluck('id')->toArray();
        $klasifikasiIds = Klasifikasi::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        // --- SEED TABEL PENERIMA (Surat Masuk di level Penerima) ---
        for ($i = 1; $i <= 25; $i++) {
            Penerima::create([
                'tanggal_terima' => now()->subDays(rand(0, 5)),
                'tanggal_surat'  => now()->subDays(rand(6, 15)),
                'no_urut'        => $i,
                'no_surat'       => "SM/" . $faker->bothify('??/####/2026'),
                'banyak_surat'   => rand(1, 3),
                'direktorat_id'  => $faker->randomElement($unitIds),
                'kode_id'        => $faker->randomElement($kodeIds),
                'pengirim'       => $faker->company,
                'perihal'        => "Laporan " . $faker->sentence(3),
                'kontak_person'  => $faker->phoneNumber,
                'sifat_surat_id' => $faker->randomElement($sifatIds),
                'ringkasan_poko' => $faker->paragraph,
                'catatan'        => $faker->sentence,
                'file_upload'    => "surat_masuk_$i.pdf",
                'no_box'         => "BOX-" . rand(1, 10),
                'no_rak'         => "RAK-" . rand(1, 5),
            ]);
        }

        // --- SEED TABEL TAMBAH SURAT KELUAR ---
        for ($j = 1; $j <= 25; $j++) {
            $status = $faker->randomElement(['pending', 'approved', 'rejected']);
            
            TambahSuratKeluar::create([
                'tanggal_surat'    => now()->subDays(rand(0, 10)),
                'klasifikasi_id'   => $faker->randomElement($klasifikasiIds),
                'no_urut'          => $j,
                'kode_id'          => $faker->randomElement($kodeIds),
                'no_surat'         => "SK/" . $faker->bothify('??/####/2026'),
                'sifat_surat_id'   => $faker->randomElement($sifatIds),
                'perihal'          => "Permohonan " . $faker->sentence(4),
                'direktorat_id'    => $faker->randomElement($unitIds),
                'kontak_person'    => $faker->name,
                'kepada'           => $faker->jobTitle . " " . $faker->company,
                'keterangan'       => $faker->text(100),
                'upload_file'      => "surat_keluar_$j.pdf",
                'lampiran'         => rand(0, 1) ? "1 Berkas" : "Nihil",
                'status'           => $status,
                'alasan_penolakan' => $status === 'rejected' ? 'Dokumen kurang lengkap' : null,
                'is_requested'     => true,
                'dokumen_asli'     => $faker->boolean,
                'user_id'          => $faker->randomElement($userIds),
                'is_sopd_req'      => $faker->boolean,
            ]);
        }
    }
}