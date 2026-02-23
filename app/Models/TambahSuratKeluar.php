<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class TambahSuratKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_surat',
        'klasifikasi_id',
        'no_urut',
        'kode_id',
        'no_surat',
        'sifat_surat_id',
        'perihal',
        'direktorat_id',
        'kontak_person',
        'kepada',
        'keterangan',
        'upload_file',
        'lampiran',
    ];
}
