<?php 

use App\Http\Controllers\LineaFarmaceuticaController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::resource('lineasFarmaceuticas',LineaFarmaceuticaController::class)->names('lineasFarmaceuticas');
});