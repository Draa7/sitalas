<?php

namespace App\Models;
use App\Models\Penerima;
use App\Models\TambahSuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'index',
        'tahun',
    ];

    public function Penerima()
    {
        return $this->hasMany(Penerima::class, 'kode_id');
    }
    public function suratKeluar()
    {
        return $this->hasMany(TambahSuratKeluar::class, 'kode_id');
    }
    public function suratMasuk()
    {
        return $this->hasMany(SuratMasuk::class, 'kode_id');
    }
}
