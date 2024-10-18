<?php

use App\Http\Controllers\BahiaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EtapaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TecnicoController;
use App\Models\Servicio;
use App\Models\Tecnico;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the aaaaaaaRouteServiceProvider and all of them will
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
Route::resource('Clientes', ClienteController::class);
//Ruta Tecnicos
Route::resource('Tecnicos',TecnicoController::class);
//Ruta Servicios
Route::resource('Servicios', EtapaController::class);
//Ruta Bahia
Route::resource('Bahias', BahiaController::class);
//Ruta Repuestos   
// Route::resource('Repuestos'