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
            'nombre' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'descripcion' => 'required|string|max:255',
        ]);

        //Crear un Cliente
        $bahias = new Bahia();
        $bahias->nombre = $validateData['nombre'];
        $bahias->img = $validateData['img'] ?? null;
        $bahias->descripcion = $validateData['descripcion'];

        if ($request->hasFile('img')) {
            // Obtener el archivo
            $file = $request->file('img');
            // Crear un nombre único para la imagen
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // Mover el archivo a la carpeta 'public/fotos'
            $file->move(public_path('img'), $filename);
            // Guardar el nombre de la imagen en la base de datos
            $bahias->img = 'img/' . $filename;
        }
        $bahias->save();

        return redirect()->route('Bahias.store')->with('success', 'Cliente creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_bahia)
    {
        $bahias = Bahia::find($id_bahia);
        return view('Bahias.show', compact('bahias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_bahia)
    {
        $bahias = Bahia::findorFail($id_bahia);
        return view('Bahias.edit', compact('bahias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_bahia)
    {
        $validateData = $request->validate([
            'nombre' => 'required|string|max:255',
            'img' => 'nullable',
            'descripcion' => 'required|string|max:255',
        ]);

        $bahias = Bahia::find($id_bahia);

        if (!$bahias) {
            return redirect()->route('Bahias.index')->with('error', 'Bahia no encontrada.');
        }

        $bahias->update($validateData);

        return redirect()->route('Bahias.show', $bahias->id_bahia)->with('success', 'Bahia actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_bahia)
    {
        $bahias = Bahia::find($id_bahia);

        $bahias->delete();

        // Redirige al índice con un mensaje de éxito
        return redirect()->route('Bahias.index')->with('success', 'Tecnico eliminado correctamente.');
    }

    //Todo asignar bahias

    public function asignarBahias($id_servicio)
    {
        $bahias = Bahia::all();
        $servicio = Servicio::find($id_servicio);

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

    public function showServicioBahias($id_servicio_bahia)
    {

        $servicio = Servicio::find($id_servicio_bahia);
        $servicio_existentes = ServiciosBahias::where('servicios_id_servicio', $servicio->id_servicio)->get();
        return view('Bahias.showServicioBahias', compact('servicio_existentes', 'servicio'));
    }
    public function editServicioBahias($id_servicio_bahia)
    {
        // Obtener la relación específica en la tabla pivote
        $servicio_existentes = ServiciosBahias::findOrFail($id_servicio_bahia);

        // Obtener el servicio relacionado
        $servicio = Servicio::findOrFail($servicio_existentes->servicios_id_servicio);

        return view('Bahias.editServicioBahias', compact('servicio', 'servicio_existentes'));
    }
    public function updateServicioBahias(Request $request, $id_servicio_bahia)
    {
        // Validar los datos enviados
        $validateData = $request->validate([
            'TRG' => 'nullable|string',
            'fecha_inicio' => 'nullable|date_format:Y-m-d',
            'fecha_fin' => 'nullable|date_format:Y-m-d',
            'alcance' => 'nullable|string',
            'herramienta' => 'nullable|string',
            'documentacion' => 'nullable|string',
            'requerimientos' => 'nullable|string',
            'actividad' => 'nullable|string',
        ]);

        // Buscar la relación en la tabla pivote
        $servicioBahia = ServiciosBahias::findOrFail($id_servicio_bahia);

        // Actualizar los datos de la relación
        $servicioBahia->update($validateData);

        // Redirigir con un mensaje de éxito
        return redirect()->route('showServicioBahias', ['id_servicio_bahia' => $id_servicio_bahia])
            ->with('success', 'Información de la bahía actualizada exitosamente.');
    }
    public function destroyServicioBahias($id_servicio_bahia)
    {
        // Buscar la relación en la tabla pivote
        $servicioBahia = ServiciosBahias::findOrFail($id_servicio_bahia);

        // Eliminar la relación
        $servicioBahia->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('showServicioBahias', ['id_servicio_bahia' => $servicioBahia->servicios_id_servicio])
            ->with('success', 'Bahía eliminada exitosamente del servicio.');
    }
}
