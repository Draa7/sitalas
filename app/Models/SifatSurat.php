<?php

namespace App\Models;
use App\Models\Penerima;
use App\Models\TambahSuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SifatSurat extends Model
{
    use HasFactory;
    protected $fillable = [
        'sifat_surat',
    ];

    public function Penerima()
    {
        return $this->hasMany(Penerima::class, 'sifat_surat_id');
    }
    public function suratKeluar()
    {
        return $this->hasMany(TambahSuratKeluar::class, 'sifat_surat_id');
    }
    public function suratMasuk()
    {
        return $this->hasMany(SuratMasuk::class, 'sifat_surat_id');
    }
}
