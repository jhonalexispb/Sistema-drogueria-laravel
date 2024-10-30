<?php 

use App\Http\Controllers\LaboratorioController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/laboratorios/siguiente-codigo', [LaboratorioController::class, 'siguienteCodigo']);
    Route::resource('laboratorios',LaboratorioController::class)->except(['create'])->names('laboratorios');
});