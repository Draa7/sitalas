<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UnitPengolah;
class IntruksiDisposisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'direktorat_id',
        'intruksi',
        'urutan',
        'active',
    ];

    public function unitPengolah()
    {
        return $this->belongsTo(UnitPengolah::class, 'direktorat_id');
    }
}
