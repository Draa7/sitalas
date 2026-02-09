<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenBiro extends Model
{
    use HasFactory;

    protected $fillable= [
        'asisten',
        'biro',
    ];
}
