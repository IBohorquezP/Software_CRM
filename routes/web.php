<?php

use App\Http\Controllers\BahiaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EtapaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\RepuestosController;
use App\Http\Controllers\ServicioController;
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

// //Ruta Clientes
// Route::resource('Clientes', ClienteController::class);
Route::get('/Clientes', [ClienteController::class, 'index'])->name('Clientes.index');         // Mostrar lista de clientes
Route::get('/Clientes/create', [ClienteController::class, 'create'])->name('Clientes.create'); // Mostrar formulario de creación
Route::post('/Clientes', [ClienteController::class, 'store'])->name('Clientes.store');        // Guardar nuevo cliente
Route::get('/Clientes/{id_cliente}', [ClienteController::class, 'show'])->name('Clientes.show'); // Mostrar cliente específico
Route::get('/Clientes/{id_cliente}/edit', [ClienteController::class, 'edit'])->name('Clientes.edit'); // Formulario de edición
Route::put('/Clientes/{id_cliente}', [ClienteController::class, 'update'])->name('Clientes.update');  // Actualizar cliente
Route::delete('/Clientes/{id_cliente}', [ClienteController::class, 'destroy'])->name('Clientes.destroy'); // Eliminar cliente


// //Ruta Tecnicos
// Route::resource('Tecnicos',TecnicoController::class);
Route::get('/Tecnicos', [TecnicoController::class, 'index'])->name('Tecnicos.index');
Route::get('/Tecnicos/create', [TecnicoController::class, 'create'])->name('Tecnicos.create');
Route::post('/Tecnicos', [TecnicoController::class, 'store'])->name('Tecnicos.store');
Route::get('/Tecnicos/{id_tecnico}', [TecnicoController::class, 'show'])->name('Tecnicos.show');
Route::get('/Tecnicos/{id_tecnico}/edit', [TecnicoController::class, 'edit'])->name('Tecnicos.edit');
Route::put('/Tecnicos/{id_tecnico}', [TecnicoController::class, 'update'])->name('Tecnicos.update');
Route::delete('/Tecnicos/{id_tecnico}', [TecnicoController::class, 'destroy'])->name('Tecnicos.destroy');

// //Ruta Etapas
// Route::resource('Etapas', EtapaController::class);
Route::get('/Etapas', [EtapaController::class, 'index'])->name('Etapas.index');
Route::get('/Etapas/create', [EtapaController::class, 'create'])->name('Etapas.create');
Route::post('/Etapas', [EtapaController::class, 'store'])->name('Etapas.store');
Route::get('/Etapas/{id_etapa}', [EtapaController::class, 'show'])->name('Etapas.show');
Route::get('/Etapas/{id_etapa}/edit', [EtapaController::class, 'edit'])->name('Etapas.edit');
Route::put('/Etapas/{id_etapa}', [EtapaController::class, 'update'])->name('Etapas.update');
Route::delete('/Etapas/{id_etapa}', [EtapaController::class, 'destroy'])->name('Etapas.destroy');


// //Ruta Bahia
// Route::resource('Bahias', BahiaController::class);
Route::get('/Bahias', [BahiaController::class, 'index'])->name('Bahias.index');
Route::get('/Bahias/create', [BahiaController::class, 'create'])->name('Bahias.create');
Route::post('/Bahias', [BahiaController::class, 'store'])->name('Bahias.store');
Route::get('/Bahias/{id_bahia}', [BahiaController::class, 'show'])->name('Bahias.show');
Route::get('/Bahias/{id_bahia}/edit', [BahiaController::class, 'edit'])->name('Bahias.edit');
Route::put('/Bahias/{id_bahia}', [BahiaController::class, 'update'])->name('Bahias.update');
Route::delete('/Bahias/{id_bahia}', [BahiaController::class, 'destroy'])->name('Bahias.destroy');

Route::controller(BahiaController::class)->group(function(){
    // Route::get('/AsignarBahias','asignarBahias')->name('Bahias.asignarBahias');
    Route::get('/AsignarBahias/{id_servicio}','asignarBahias')->name('Bahias.asignarBahias');
});

// //Ruta Repuestos   
// Route::resource('Repuestos', RepuestosController::class);
Route::get('/Repuestos', [RepuestosController::class, 'index'])->name('Repuestos.index');
Route::get('/Repuestos/create', [RepuestosController::class, 'create'])->name('Repuestos.create');
Route::post('/Repuestos', [RepuestosController::class, 'store'])->name('Repuestos.store');
Route::get('/Repuestos/{id_repuesto}', [RepuestosController::class, 'show'])->name('Repuestos.show');
Route::get('/Repuestos/{id_repuesto}/edit', [RepuestosController::class, 'edit'])->name('Repuestos.edit');
Route::put('/Repuestos/{id_repuesto}', [RepuestosController::class, 'update'])->name('Repuestos.update');
Route::delete('/Repuestos/{id_repuesto}', [RepuestosController::class, 'destroy'])->name('Repuestos.destroy');

// //Ruta Servicios
// Route::resource('Servicios', ServicioController::class);
Route::get('/Servicios', [ServicioController::class, 'index'])->name('Servicios.index');
Route::get('/Servicios/create', [ServicioController::class, 'create'])->name('Servicios.create');
Route::post('/Servicios', [ServicioController::class, 'store'])->name('Servicios.store');
Route::get('/Servicios/{id_servicio}', [ServicioController::class, 'show'])->name('Servicios.show');
Route::get('/Servicios/{id_servicio}/edit', [ServicioController::class, 'edit'])->name('Servicios.edit');
Route::put('/Servicios/{id_servicio}', [ServicioController::class, 'update'])->name('Servicios.update');
Route::delete('/Servicios/{id_servicio}', [ServicioController::class, 'destroy'])->name('Servicios.destroy');