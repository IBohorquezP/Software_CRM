<?php

namespace App\Http\Controllers;

use App\Models\Bahia;
use App\Models\Servicio;
use Illuminate\Http\Request;

class BahiaController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('role:Admin')->only('create','edit','destroy');
    // }

    public function index()
    {
        $bahias = Bahia::all(); // Obtiene todos los clientes desde la base de datos
        return view('Bahias.index', compact('bahias')); // Pasa $clientes a la vista
    }


    public function create()
    {
        return view('Bahias.create');
    }


    public function store(Request $request)
    {
        //Validacion de datos bahias
        $validateData = $request->validate([
            'nombre' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'descripcion' => 'required|string|max:255',
        ]);

        //Crear un Cliente
        $bahias = new Bahia();
        $bahias->nombre = $validateData['nombre'];
        $bahias->foto = $validateData['foto'] ?? null;
        $bahias->descripcion = $validateData['descripcion'];

        if ($request->hasFile('foto')) {
            // Obtener el archivo
            $file = $request->file('foto');
            // Crear un nombre único para la imagen
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // Mover el archivo a la carpeta 'public/fotos'
            $file->move(public_path('fotos'), $filename);
            // Guardar el nombre de la imagen en la base de datos
            $bahias->foto = 'fotos/' . $filename;
        }
        $bahias->save();

        return redirect()->route('Bahias.store')->with('success', 'Cliente creado correctamente.');
    }


    public function show($id_bahia)
    {
        $bahias = Bahia::find($id_bahia);
        return view('Bahias.show', compact('bahias'));
    }


    public function edit($id_bahia)
    {
        $bahias = Bahia::findorFail($id_bahia);
        return view('Bahias.edit', compact('bahias'));
    }


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
        $servicio = Servicio::findOrFail($id_servicio);

        // Obtener las bahías no asignadas al servicio
        $bahiasAsignadas = $servicio->bahias()->pluck('id_bahia')->toArray(); // Obtener IDs de bahías asignadas
        $bahias = Bahia::whereNotIn('id_bahia', $bahiasAsignadas)->get(); // Excluir bahías asignadas

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
        $bahias = $servicio->bahias()->get();
        $id_etapa = $servicio->etapa->id_etapa;
        return view('Bahias.showServicioBahias', compact('bahias', 'servicio', 'id_etapa'));
    }


    public function editServicioBahias($id_servicio, $id_bahia)
    {
        // Encontrar el servicio por el ID proporcionado
        $servicio = Servicio::findOrFail($id_servicio);

        $bahia = $servicio->bahias()->where('id_bahia', $id_bahia)->first();

        $bahias = Bahia::all();

        return view('Bahias.editServicioBahias', compact('bahia', 'bahias', 'servicio'));
    }


    public function updateServicioBahias(Request $request, $id_servicio, $id_bahia)
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

        // Encontrar el servicio por el ID proporcionado
        $servicio = Servicio::findOrFail($id_servicio);

        // Encontrar la relación en la tabla pivote
        $servicioBahia = $servicio->bahias()->where('id_bahia', $id_bahia)->firstOrFail();

        // Actualizar los datos de la relación
        $servicioBahia->pivot->update($validateData);

        // Redirigir con un mensaje de éxito
        return redirect()->route('Bahias.showServicioBahias', ['id_servicio_bahia' => $id_servicio])
            ->with('success', 'Información de la bahía actualizada exitosamente.');
    }


    public function destroyServicioBahias($id_servicio, $id_bahia)
    {
        // Encontrar el servicio por el ID proporcionado
        $servicio = Servicio::findOrFail($id_servicio);

        // Buscar la bahía en la relación pivote
        $servicioBahia = $servicio->bahias()->where('id_bahia', $id_bahia)->firstOrFail();

        // Eliminar la relación en la tabla pivote
        $servicio->bahias()->detach($id_bahia);

        // Redirigir con un mensaje de éxito
        return redirect()->route('Bahias.showServicioBahias', ['id_servicio_bahia' => $id_servicio])
            ->with('success', 'Bahía eliminada exitosamente del servicio.');
    }
}
