<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Cliente;
use App\Models\Etapa;
use App\Models\Bahia;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::all();
        return view('Servicios.index',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all(); // Obtiene todos los clientes desde la base de datos
        $etapas = Etapa::all(); // Obtiene todas las etapas desde la base de datos
        $bahias = Bahia::all(); // Obtiene todas las bahias desde la base de datos
        // $tecnicos = Tecnico::all(); //Obtiene todos los tecnicos desde la base de datos
        return view('Servicios.create', compact('clientes','etapas','bahias')); // Pasa todo a la vista de creación de servicios
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos del servicio
        $validateData = $request->validate([
            'serial' => 'required|string|max:255',
            'servicio' => 'required|string|max:255',
            'componente' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'marca' => 'nullable|string',
            'horometro' => 'nullable|string',
            'fecha_llegada' => 'required|date_format:Y/m/d|max:255',
            'fecha_salida_estimada' => 'nullable|date_format:Y/m/d|max:255',
            'fecha_salida_real' => 'nullable|date_format:Y/m/d|max:255',
            'contador' => 'nullable|string|max:255',
            'requisito' => 'nullable|string|max:255',
            'nota' => 'string|max:255',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_etapa' => 'required|exists:etapas,id_etapa',
        ]);
    
        // Crear un Servicio
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
        $servicio->clientes_id_cliente = $validateData['id_cliente'];
        $servicio->etapas_id_etapa = $validateData['id_etapa'];
        $servicio->save();

        return redirect()->route('Bahias.asignarBahias', ['id_servicio' => $servicio->id_servicio])->with('success');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id_servicio)
    {
        $servicio = Servicio::with('cliente','etapa')->find($id_servicio);
        $clientes = Cliente::all();
        $etapas = Etapa::all();

        return view('Servicios.show', compact('servicio','clientes','etapas')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_servicio)
    {
        $servicio = Servicio::with('cliente','etapa')->find($id_servicio);
        $clientes = Cliente::all();
        $etapas = Etapa::all();
        return view('Servicios.edit', compact('servicio','clientes','etapas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_servicio)
    {
        $validateData = $request->validate([
            'serial' => 'required|string|max:255',
            'servicio' => 'required|string|max:255',
            'componente' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'marca' => 'nullable|string',
            'horometro' => 'nullable|string',
            'fecha_llegada' => 'required|date_format:Y/m/d|max:255',
            'fecha_salida_estimada' => 'nullable|date_format:Y/m/d|max:255',
            'fecha_salida_real' => 'nullable|date_format:Y/m/d|max:255',
            'contador' => 'nullable|string|max:255',
            'requisito' => 'nullable|string|max:255',
            'nota' => 'string|max:255',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_etapa' => 'required|exists:etapas,id_etapa',
        ]);
        
        $servicio = Servicio::find($id_servicio);
        
        if (!$servicio) {
            return redirect()->route('Servicios.index')->with('error', 'Cliente no encontrado.');
        }
    
        $servicio->update($validateData);
    
        return redirect()->route('Servicios.show', $servicio->id_servicio)->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_servicio)
    {
        // Encuentra el servicio por su ID
        $servicio = Servicio::find($id_servicio);
    
        $servicio->servicios()->delete();
        $servicio->delete();
    
        // Redirige al índice con un mensaje de éxito
        return redirect()->route('Servicios.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
