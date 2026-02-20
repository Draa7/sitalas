<?php

namespace App\Models;
use App\Models\Penerima;
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
}
