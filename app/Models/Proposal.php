<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\models\UnitPengolah;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'no_reg',
        'direktorat_id',
        'pengirim',
        'perihal',
    ];

    public function unitPengolah()
    {
        return $this->belongsTo(UnitPengolah::class, 'direktorat_id');
    }
}
