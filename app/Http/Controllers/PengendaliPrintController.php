<?php

namespace App\Http\Controllers;

use App\Models\Pengendali;
use Barryvdh\DomPDF\Facade\Pdf;

class PengendaliPrintController extends Controller
{
    public function print($id)
    {
        $data = Pengendali::with([
            'unitPengolah',
            'kodeSurat',
        ])->findOrFail($id);

        $pdf = Pdf::loadView('print.pengendali', compact('data'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('pengendali-'.$data->id.'.pdf');
    }
}