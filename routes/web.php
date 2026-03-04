<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalPrintController;
use App\Http\Controllers\PengendaliPrintController;
use App\Http\Controllers\FileController;

Route::get('/penerimas/{penerima}/file', [FileController::class, 'penerima'])
    ->name('penerimas.file.show');

Route::get('/pengarahs/{pengarah}/file', [FileController::class, 'pengarah'])
    ->name('pengarahs.file.show');

Route::get('/pengendalis/{pengendali}/file', [FileController::class, 'pengendali'])
    ->name('pengendalis.file.show');

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/admin');
Route::middleware(['auth'])->group(function () {
    Route::get('/report/proposal/print', ProposalPrintController::class)
        ->name('report.proposal.print');
Route::get('/pengendali/{id}/print', [PengendaliPrintController::class, 'print'])
    ->name('pengendali.print');
});