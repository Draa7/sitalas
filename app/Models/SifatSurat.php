<?php

namespace App\Models;
use App\Models\Penerima;
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
}
