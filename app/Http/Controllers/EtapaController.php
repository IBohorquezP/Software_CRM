<?php

namespace App\Http\Controllers;

use App\Models\Etapa;
use Illuminate\Http\Request;

class EtapaController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware('role:Admin')->only('create','edit','destroy');
    // }

    public function index()
    {
        $etapas = Etapa::all(); 
        return view('Etapas.index', compact('etapas')); 
    }

 
    public function create()
    {
        $etapa = new Etapa();
        return view('Etapas.create');
    }


    public function store(Request $request)
    {
        //Validacion de datos etapa
        $validateData = $request->validate([
        'nombre'=> 'required|string|min:3|max:255', 
        'descripcion'=> 'required|string|max:255',
        'img'=> 'nullable',
        ]);

        //Crear una Etapa
        $etapa = new Etapa();
        $etapa->nombre =$validateData['nombre'] ;
        $etapa->descripcion = $validateData['descripcion'];    
        $etapa->foto = $validateData['foto'] ?? null; 

        if ($request->hasFile('foto')) {
            // Obtener el archivo
            $file = $request->file('foto');
            // Crear un nombre único para la imagen
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // Mover el archivo a la carpeta 'public/fotos'
            $file->move(public_path('fotos'), $filename);
            // Guardar el nombre de la imagen en la base de datos
            $etapa->foto = 'fotos/' . $filename;
        }
        $etapa->save();

        return redirect()->route('Etapas.store')->with('success', 'Etapa creada correctamente.');

    }


    public function show ($id_etapa)
    {
        $etapa = Etapa::find($id_etapa);
        
        return view('Etapas.show', compact('etapa'));
    }


    public function edit(Etapa $etapa)
    {
        return view('Etapas.edit', compact('etapa'));
    }


    public function update(Request $request, Etapa $etapa)
    {
        //
    }


    public function destroy(Etapa $etapa)
    {
        //
    }
}