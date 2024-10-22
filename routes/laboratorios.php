<?php 

use App\Http\Controllers\LaboratorioController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::resource('laboratorios',LaboratorioController::class)->names('laboratorios');
});