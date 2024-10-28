<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Servicios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //Validacion de datos Servicio
        $validateData = $request->validate([
            'serial' => 'required|string|max:255',
            'servicio' => 'required|string|max:255',
            'componente' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'horometro' => 'required|string',
            'fecha_llegada' => 'required|string|max:255',
            'fecha_salida_estimada' => 'required|string|max:255',
            'fecha_salida_real' => 'required|string|max:255',
            'contador' => 'required|string|max:255',
            'requisito' => 'required|string|max:255',
            'nota'=> 'string|max:255',
            // 'id_cliente'=> 'required',
        ]);

        //Crear un Servicio
        $servicio = new Servicio();
        $servicio->serial = $validateData['serial'];
        $servicio->servicio = $validateData['servicio'];
        $servicio->componente = $validateData['componente'];
        $servicio->modelo = $validateData['modelo'];
        $servicio->marca = $validateData['marca'];
        $servicio->horometro = $validateData['horometro'];
        $servicio->fecha_llegada = $validateData['fecha_llegada'];
        $servicio->fecha_salida_estimada = $validateData['fecha_salida_estimada'];
        $servicio->fecha_salida_real = $validateData['fecha_salida_real'];
        $servicio->contador = $validateData['contador'];
        $servicio->requisito = $validateData['requisito'];
        $servicio->nota = $validateData['nota'];
        // $servicio->id_cliente = $validateData['id_cliente'];
        $servicio->save();

        return redirect()->route('Motores-Servicios.store')->with('success', 'Servicio creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('Servicios.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('Servicios.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servicio $servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servicio $servicio)
    {
        //
    }
}
