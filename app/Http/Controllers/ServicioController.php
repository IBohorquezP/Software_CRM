<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Cliente;
use App\Models\Etapa;
use App\Models\Tecnico;
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
        $clientes = Cliente::all(); // Obtiene todos los clientes desde la base de datos
        $etapas = Etapa::all(); // Obtiene todas las etapas desde la base de datos
        $tecnicos = Tecnico::all(); //Obtiene todos los tecnicos desde la base de datos
        return view('Servicios.create', compact('clientes','etapas','tecnicos')); // Pasa todo a la vista de creación de servicios
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
         //Validacion de datos Servicio
        $validateData = $request->validate([
            'serial' => 'required|string|max:255',
            'servicio' => 'required|string|max:255',
            'componente' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'marca' => 'nullable|string|max:255',
            'horometro' => 'nullable|string',
            'fecha_llegada' => 'required|datetime:Y-m-d H:00|max:255',
            'fecha_salida_estimada' => 'required|datetime:Y-m-d H:00|max:255',
            'fecha_salida_real' => 'required|datetime:Y-m-d H:00|max:255',
            'contador' => 'nullable|string|max:255',
            'requisito' => 'nullable|string|max:255',
            'nota'=> 'string|max:255',
            'id_cliente'=> 'required|exists:clientes,id',
            'id_etapa'=>'required|exists:etapas,id',
            'id_tecnico'=>'required|array',
            'id_tecnicos.*' => 'exists:tecnicos,id'
        ]);

        //Crear un Servicio
        $servicio = new Servicio();
        $servicio->serial = $validateData['serial'];
        $servicio->servicio = $validateData['servicio'];
        $servicio->componente = $validateData['componente'];
        $servicio->modelo = $validateData['modelo'];
        $servicio->horometro = $validateData['horometro'];
        $servicio->marca = $validateData['marca'];
        $servicio->fecha_llegada = $validateData['fecha_llegada'];
        $servicio->fecha_salida_estimada = $validateData['fecha_salida_estimada'];
        $servicio->fecha_salida_real = $validateData['fecha_salida_real'];
        $servicio->contador = $validateData['contador'];
        $servicio->requisito = $validateData['requisito'];
        $servicio->nota = $validateData['nota'];
        $servicio->id_cliente = $validateData['id_cliente'];
        $servicio->id_etapa = $validateData['id_etapa'];
   
        // Guardar técnicos seleccionados en la tabla intermedia
        $servicio->tecnicos()->sync($validateData['id_tecnicos']);
        // Guardar servicio
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
