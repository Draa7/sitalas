<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalPrintController;
use App\Http\Controllers\FileController;

 Route::get('/penerimas/{record}/file', [FileController::class, 'show'])
    ->name('penerimas.file.show');

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/admin');
Route::middleware(['auth'])->group(function () {
    Route::get('/report/proposal/print', ProposalPrintController::class)
        ->name('report.proposal.print');
});