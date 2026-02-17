<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\VehiculoController;

Route::apiResource('libros', LibroController::class);
Route::apiResource('vehiculos', VehiculoController::class);














