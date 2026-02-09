<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitPengolah extends Model
{
    use HasFactory;

    protected $fillable = [
        'direktorat',
        'kode_surat',
        'urutan',
        'no_hp_1',
        'no_hp_2',
        'no_hp_3',
        'no_hp_4',
        'bold',
        'all_data',
        'sekretaris',
        'asisten',
        'biro',
        'sub_biro',
        'active',
    ];

    protected $casts = [
        'urutan' => 'integer',
        'bold' => 'boolean',
        'all_data' => 'boolean',
        'sekretaris' => 'boolean',
        'asisten' => 'boolean',
        'biro' => 'boolean',
        'sub_biro' => 'boolean',
        'active' => 'boolean',
    ];
}
