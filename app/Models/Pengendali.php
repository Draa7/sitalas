<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengendali extends Model
{
    protected $guarded = [];

    public function penerima()
    {
        return $this->belongsTo(Penerima::class, 'penerima_id');
    }

    public function unitPengolah()
    {
        return $this->belongsTo(UnitPengolah::class, 'direktorat_id');
    }

    public function kodeSurat()
    {
        return $this->belongsTo(KodeSurat::class, 'kode_id');
    }

    public function sifatSurat()
    {
        return $this->belongsTo(SifatSurat::class, 'sifat_surat_id');
    }
}
