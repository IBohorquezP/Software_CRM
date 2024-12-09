<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use App\Models\Servicio;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{


    public function index()
    {
        $tecnicos = Tecnico::all(); // Obtiene todos los clientes desde la base de datos
        return view('Tecnicos.index', compact('tecnicos')); // Pasa $clientes a la vista
    }


    public function create()
    {
        return view('Tecnicos.create');
    }


    public function store(Request $request)
    {
        //Validacion de datos tecnico
        $validateData = $request->validate([
            'cod_mecanico' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //Crear una Etapa
        $tecnico = new Tecnico();
        $tecnico->cod_mecanico = $validateData['cod_mecanico'];
        $tecnico->nombre = $validateData['nombre'];
        $tecnico->apellido = $validateData['apellido'];
        $tecnico->cedula = $validateData['cedula'];
        $tecnico->cargo = $validateData['cargo'];
        $tecnico->foto = $validateData['foto'] ?? null;

        if ($request->hasFile('foto')) {
            // Obtener el archivo
            $file = $request->file('foto');
            // Crear un nombre único para la imagen
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // Mover el archivo a la carpeta 'public/fotos'
            $file->move(public_path('fotos'), $filename);
            // Guardar el nombre de la imagen en la base de datos
            $tecnico->foto = 'fotos/' . $filename;
        }
        $tecnico->save();

        return redirect()->route('Tecnicos.store')->with('success', 'Tecnico creado correctamente.');
    }


    public function show($id_tecnico)
    {
        $tecnico = Tecnico::find($id_tecnico);
        // Devuelve la vista 'tecnicos.show' pasando el tecnico encontrado
        return view('Tecnicos.show', compact('tecnico'));
    }


    public function edit($id_tecnico)
    {
        $tecnico = Tecnico::findorFail($id_tecnico);
        return view('Tecnicos.edit', compact('tecnico'));
    }


    public function update(Request $request, $id_tecnico)
    {
        $validateData = $request->validate([
            'cod_mecanico' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'foto' => 'nullable',
        ]);

        $tecnico = Tecnico::find($id_tecnico);

        if (!$tecnico) {
            return redirect()->route('Tecnicos.index')->with('error', 'Tecnico no encontrado.');
        }

        $tecnico->update($validateData);

        return redirect()->route('Tecnicos.show', $tecnico->id_tecnico)->with('success', 'Tecnico actualizado correctamente.');
    }


    public function destroy($id_tecnico)
    {
        $tecnico = Tecnico::find($id_tecnico);

        $tecnico->delete();

        // Redirige al índice con un mensaje de éxito
        return redirect()->route('Tecnicos.index')->with('success', 'Tecnico eliminado correctamente.');
    }

    //Todo Asignar tecnicos a servicios
    public function asignarTecnicos($id_servicio)
    {
        $servicio = Servicio::findOrFail($id_servicio);

        // Obtener los técnicos no asignados al servicio
        $tecnicosAsignados = $servicio->tecnicos()->pluck('id_tecnico')->toArray(); // IDs de técnicos asignados
        $tecnicos = Tecnico::whereNotIn('id_tecnico', $tecnicosAsignados)->get(); // Excluir técnicos asignados

        return view('Tecnicos.asignarTecnicos', compact('tecnicos', 'id_servicio', 'servicio'));
    }

    public function attachServicio(Request $request)
    {
        $validatedData = $request->validate([
            'id_servicio' => 'required|exists:servicios,id_servicio',
            'id_tecnico' => 'required|exists:tecnicos,id_tecnico',
        ]);

        $servicio = Servicio::findOrFail($validatedData['id_servicio']);

        // Verifica si el técnico ya está asignado al servicio
        if ($servicio->tecnicos()->where('id_tecnico', $validatedData['id_tecnico'])->exists()) {
            return redirect()->route('Tecnicos.asignarTecnicos', ['id_servicio' => $validatedData['id_servicio']])
                ->with('error', 'El técnico ya está asignado a este servicio.');
        }

        // Asigna el técnico al servicio
        $servicio->tecnicos()->attach($validatedData['id_tecnico']);

        return redirect()->route('Tecnicos.showServicioTecnicos', ['id_servicio_tecnico' => $validatedData['id_servicio']])
            ->with('success', 'Técnico asignado exitosamente al servicio.');
    }


    public function showServicioTecnicos($id_servicio_tecnico)
    {
        $servicio = Servicio::findOrFail($id_servicio_tecnico);
        $tecnicos = $servicio->tecnicos; // Obtener los técnicos asignados directamente

        return view('Tecnicos.showServicioTecnicos', compact('tecnicos', 'servicio'));
    }

    public function editServicioTecnicos($id_servicio, $id_tecnico)
    {
        $servicio = Servicio::findOrFail($id_servicio);
        $tecnico = $servicio->tecnicos()->where('id_tecnico', $id_tecnico)->firstOrFail();
        $tecnicos = Tecnico::all();

        return view('Tecnicos.editServicioTecnicos', compact('tecnico', 'tecnicos', 'servicio'));
    }

    public function updateServicioTecnicos(Request $request, $id_servicio, $id_tecnico)
    {
        // Si no hay información adicional en la tabla pivote, no es necesario actualizar nada.
        return redirect()->route('showServicioTecnicos', ['id_servicio' => $id_servicio])
            ->with('success', 'Información del técnico actualizada exitosamente.');
    }

    public function destroyServicioTecnicos($id_servicio, $id_tecnico)
    {
        // Encuentra el servicio por su ID
        $servicio = Servicio::findOrFail($id_servicio);

        // Eliminar la relación en la tabla pivote
        $servicio->tecnicos()->detach($id_tecnico);

        // Si necesitas id_servicio_tecnico, obténlo de la relación (opcional)
        // Si solo usas id_servicio, ajusta la ruta en web.php
        return redirect()->route('Tecnicos.showServicioTecnicos', ['id_servicio_tecnico' => $id_servicio])
            ->with('success', 'Técnico eliminado exitosamente del servicio.');
    }
}
