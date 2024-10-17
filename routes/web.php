<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Servicio;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Ruta Home
Route::get('/', HomeController::class);

//Ruta Planificación
Route::get('/planificacion', function () {
    return view('planificacion');
});

//Ruta Clientes

//Ruta Tecnicos

//Ruta Servicios

//Ruta Repuestos