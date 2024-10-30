<?php 

use App\Http\Controllers\PrincipioActivoController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::resource('principiosActivos',PrincipioActivoController::class)->except('create')->names('principiosActivos');
});