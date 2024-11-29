<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tecnicos = Tecnico::all(); // Obtiene todos los clientes desde la base de datos
        return view('Tecnicos.index', compact('tecnicos')); // Pasa $clientes a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tecnicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show($id_tecnico)
    {
        $tecnico = Tecnico::find($id_tecnico);
        // Devuelve la vista 'tecnicos.show' pasando el tecnico encontrado
        return view('Tecnicos.show', compact('tecnico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_tecnico)
    {
        $tecnico = Tecnico::findorFail($id_tecnico);
        return view('Tecnicos.edit', compact('tecnico'));
    }

    /**
     * Update the specified resource in storage.
     */
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_tecnico)
    {
        $tecnico = Tecnico::find($id_tecnico);

        $tecnico->delete();

        // Redirige al índice con un mensaje de éxito
        return redirect()->route('Tecnicos.index')->with('success', 'Tecnico eliminado correctamente.');
    }
}
