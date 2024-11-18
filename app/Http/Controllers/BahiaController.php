<?php

namespace App\Http\Controllers;

use App\Models\Bahia;
use App\Models\Servicio;
use App\Models\ServiciosBahias;
use Illuminate\Http\Request;

class BahiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bahias = Bahia::all(); // Obtiene todos los clientes desde la base de datos
        return view('Bahias.index', compact('bahias')); // Pasa $clientes a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        return view('Bahias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //Validacion de datos bahias
      $validateData = $request->validate([
        'nombre'=> 'required|string|max:255', 
        'img'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        'descripcion'=> 'required|string|max:255',
        ]);

        //Crear un Cliente
        $bahia = new Bahia();
        $bahia->nombre =$validateData['nombre'] ;
        $bahia->img = $validateData['img'] ?? null;
        $bahia->descripcion = $validateData['descripcion'];   
        
        if ($request->hasFile('img')) {
            // Obtener el archivo
            $file = $request->file('img');
            // Crear un nombre único para la imagen
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // Mover el archivo a la carpeta 'public/fotos'
            $file->move(public_path('img'), $filename);
            // Guardar el nombre de la imagen en la base de datos
            $bahia->img = 'img/' . $filename; 
        }
        $bahia->save();

        return redirect()->route('Bahias.store')->with('success', 'Cliente creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_bahia)
    {
        $bahia = Bahia::find($id_bahia);
        return view('Bahias.show', compact('bahia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_bahia)
    {
        $bahia = Bahia::findorFail($id_bahia);
        return view('Bahias.edit', compact('bahia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_bahia)
    {
        $validateData = $request->validate([
            'nombre'=> 'required|string|max:255', 
            'img'=> 'nullable', 
            'descripcion'=> 'required|string|max:255',
        ]);
    
        $bahia = Bahia::find($id_bahia);
        
        if (!$bahia) {
            return redirect()->route('Bahias.index')->with('error', 'Bahia no encontrada.');
        }
    
        $bahia->update($validateData);
    
        return redirect()->route('Bahias.show', $bahia->id_bahia)->with('success', 'Bahia actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_bahia)
    {
        $bahia = Bahia::find($id_bahia);

        $bahia->delete();

        // Redirige al índice con un mensaje de éxito
        return redirect()->route('Bahias.index')->with('success', 'Tecnico eliminado correctamente.');
    }

    //Todo asignar bahias
        
     public function asignarBahias($id_servicio){
        $servicio = Servicio::find($id_servicio);
        $bahias = Bahia::all(); 
        return view('Bahias.asignarBahias', compact('bahias', 'id_servicio', 'servicio'));
    }
    public function attachServicio(Request $request)
    {
        // Validar los datos enviados
        $validateData = $request->validate([
            'id_servicio' => 'required|exists:servicios,id_servicio',
            'id_bahia' => 'required|exists:bahias,id_bahia',
            'TRG' => 'nullable|string',
            'fecha_inicio' => 'nullable|date_format:Y-m-d',
            'fecha_fin' => 'nullable|date_format:Y-m-d',
            'alcance' => 'nullable|string',
            'herramienta' => 'nullable|string',
            'documentacion' => 'nullable|string',
            'requerimientos' => 'nullable|string',
            'actividad' => 'nullable|string',
        ]);
    
        // Buscar el servicio
        $servicio = Servicio::findOrFail($validateData['id_servicio']);
        if ($servicio->bahias()->where('bahias_id_bahia', $validateData['id_bahia'])->exists()) {
            return redirect()->route('Bahias.asignarBahias', ['id_servicio' => $validateData['id_servicio']])
                             ->with('error', 'La bahía ya está asignada a este servicio.');
        }
        // Asignar la bahía al servicio con la información adicional
        $servicio->bahias()->attach($validateData['id_bahia'], [
            'TRG' => $validateData['TRG'] ?? null,
            'fecha_inicio' => $validateData['fecha_inicio'] ?? null,
            'fecha_fin' => $validateData['fecha_fin'] ?? null,
            'alcance' => $validateData['alcance'] ?? null,
            'herramienta' => $validateData['herramienta'] ?? null,
            'documentacion' => $validateData['documentacion'] ?? null,
            'requerimientos' => $validateData['requerimientos'] ?? null,
            'actividad' => $validateData['actividad'] ?? null,
        ]);
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('Bahias.asignarBahias', ['id_servicio' => $validateData['id_servicio']])
                         ->with('success', 'Bahía asignada exitosamente al servicio.');
    }

    public function showServicioBahias($id_servicio_bahia){
        $servicio = Servicio::find($id_servicio_bahia);
        $servicio_existente = ServiciosBahias::where('servicios_id_servicio', $servicio->id_servicio)->get();
        // $servicio_bahias = ServiciosBahias::find($id_servicio_bahia); 
        return view('Bahias.showServicioBahias', compact('servicio_existente', 'servicio'));
    }
}