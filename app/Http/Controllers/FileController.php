<?php

namespace App\Http\Controllers;

use App\Models\Penerima; // ganti sesuai model
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function show(Penerima $record)
    {
        // optional: authorization / policy check
        // $this->authorize('view', $record);
        

        $disk = 'local'; // ganti sesuai disk kamu
        $path = $record->file_upload;

        abort_unless(Storage::disk($disk)->exists($path), 404);

        $absolutePath = Storage::disk($disk)->path($path);

        // nama file yang tampil saat download (opsional)
        $downloadName = basename($path);

        // Pakai response()->file untuk "inline" bila memungkinkan (pdf/image, dll)
        // Kalau tidak bisa inline, browser biasanya tetap download.
        return response()->file($absolutePath, [
            // kalau mau paksa download, jangan pakai file() -> pakai download()
            'Content-Disposition' => 'inline; filename="'.$downloadName.'"',
        ]);
    }
}