<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UnitPengolah;

class BiroBagian extends Model
{
    use HasFactory;

    protected $fillable = [
        'biro_unit_pengolah_id',
        'sub_biro_unit_pengolah_id',
    ];

    public function biroUnit()
    {
        return $this->belongsTo(UnitPengolah::class, 'biro_unit_pengolah_id');
    }

    public function subBiro()
    {
        return $this->belongsTo(UnitPengolah::class, 'sub_biro_unit_pengolah_id');
    }
}
