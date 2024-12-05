<?php

use App\Http\Controllers\BahiaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EtapaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RepuestoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TecnicoController;

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
Route::get('/Clientes', [ClienteController::class, 'index'])->name('Clientes.index');         // Mostrar lista de clientes
Route::get('/Clientes/create', [ClienteController::class, 'create'])->name('Clientes.create'); // Mostrar formulario de creación
Route::post('/Clientes', [ClienteController::class, 'store'])->name('Clientes.store');        // Guardar nuevo cliente
Route::get('/Clientes/{id_cliente}', [ClienteController::class, 'show'])->name('Clientes.show'); // Mostrar cliente específico
Route::get('/Clientes/{id_cliente}/edit', [ClienteController::class, 'edit'])->name('Clientes.edit'); // Formulario de edición
Route::put('/Clientes/{id_cliente}', [ClienteController::class, 'update'])->name('Clientes.update');  // Actualizar cliente
Route::delete('/Clientes/{id_cliente}', [ClienteController::class, 'destroy'])->name('Clientes.destroy'); // Eliminar cliente


// //Ruta Tecnicos
Route::get('/Tecnicos', [TecnicoController::class, 'index'])->name('Tecnicos.index');
Route::get('/Tecnicos/create', [TecnicoController::class, 'create'])->name('Tecnicos.create');
Route::post('/Tecnicos', [TecnicoController::class, 'store'])->name('Tecnicos.store');
Route::get('/Tecnicos/{id_tecnico}', [TecnicoController::class, 'show'])->name('Tecnicos.show');
Route::get('/Tecnicos/{id_tecnico}/edit', [TecnicoController::class, 'edit'])->name('Tecnicos.edit');
Route::put('/Tecnicos/{id_tecnico}', [TecnicoController::class, 'update'])->name('Tecnicos.update');
Route::delete('/Tecnicos/{id_tecnico}', [TecnicoController::class, 'destroy'])->name('Tecnicos.destroy');

// //Ruta Etapas
Route::get('/Etapas', [EtapaController::class, 'index'])->name('Etapas.index');
Route::get('/Etapas/create', [EtapaController::class, 'create'])->name('Etapas.create');
Route::post('/Etapas', [EtapaController::class, 'store'])->name('Etapas.store');
Route::get('/Etapas/{id_etapa}', [EtapaController::class, 'show'])->name('Etapas.show');
Route::get('/Etapas/{id_etapa}/edit', [EtapaController::class, 'edit'])->name('Etapas.edit');
Route::put('/Etapas/{id_etapa}', [EtapaController::class, 'update'])->name('Etapas.update');
Route::delete('/Etapas/{id_etapa}', [EtapaController::class, 'destroy'])->name('Etapas.destroy');



Route::controller(BahiaController::class)->group(function () {
    //Ruta Bahia
    Route::get('/Bahias', 'index')->name('Bahias.index');
    Route::get('/Bahias/create', 'create')->name('Bahias.create');
    Route::post('/Bahias', 'store')->name('Bahias.store');
    Route::get('/Bahias/{id_bahia}', 'show')->name('Bahias.show');
    Route::get('/Bahias/{id_bahia}/edit', 'edit')->name('Bahias.edit');
    Route::put('/Bahias/{id_bahia}', 'update')->name('Bahias.update');
    Route::delete('/Bahias/{id_bahia}', 'destroy')->name('Bahias.destroy');

    //Rutas AsignarBahias
    Route::get('/AsignarBahias/{id_servicio}', 'asignarBahias')->name('Bahias.asignarBahias');
    Route::post('/AsignarBahias/store', 'attachServicio')->name('Bahias.attachServicio');
    Route::get('/Servicio/Bahias/{id_servicio_bahia}', 'showServicioBahias')->name('showServicioBahias');
    Route::get('/Servicio/{id_servicio}/Bahias/{id_bahia}/edit', 'editServicioBahias')->name('Bahias.editServicioBahias');
    Route::put('/Servicio/{id_servicio}/Bahias/{id_bahia}', 'updateServicioBahias')->name('Bahias.updateServicioBahias');
    Route::delete('/Servicio/{id_servicio}/Bahias/{id_bahia}', 'destroyServicioBahias')->name('Bahias.destroyServicioBahias');
});

// //Ruta Repuestos   
Route::get('/Repuestos/{id_servicio}', [RepuestoController::class, 'create'])->name('Repuestos.create');
Route::post('/Servicio/Repuestos', [RepuestoController::class, 'store'])->name('Repuestos.store');
Route::get('/Servicio/Repuestos/{id_servicio}', [RepuestoController::class, 'show'])->name('Repuestos.show');
Route::get('/Servicio/{id_servicio}/Repuestos/{id_repuesto}/edit', [RepuestoController::class, 'edit'])->name('Repuestos.edit');
Route::put('/Servicio/{id_servicio}/Repuestos/{id_repuesto}', [RepuestoController::class, 'update'])->name('Repuestos.update');
Route::delete('/Servicio/{id_servicio}/Repuestos/{id_repuesto}', [RepuestoController::class, 'destroy'])->name('Repuestos.destroy');

// //Ruta Servicios
Route::get('/Servicios', [ServicioController::class, 'index'])->name('Servicios.index');
Route::get('/Servicios/create', [ServicioController::class, 'create'])->name('Servicios.create');
Route::post('/Servicios', [ServicioController::class, 'store'])->name('Servicios.store');
Route::get('/Servicios/{id_servicio}', [ServicioController::class, 'show'])->name('Servicios.show');
Route::get('/Servicios/{id_servicio}/edit', [ServicioController::class, 'edit'])->name('Servicios.edit');
Route::put('/Servicios/{id_servicio}', [ServicioController::class, 'update'])->name('Servicios.update');
Route::delete('/Servicios/{id_servicio}', [ServicioController::class, 'destroy'])->name('Servicios.destroy');

// Ruta Reporte PDF

Route::get('/Servicios/{id_servicio}/Bahias/{id_bahia}/Reporte', [PdfController::class, 'reporteServicioBahias'])->name('Servicios.reporteServicioBahias');
