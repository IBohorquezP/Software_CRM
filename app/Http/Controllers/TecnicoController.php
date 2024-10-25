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
        return view('Tecnicos.index');
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
            'cod_mecanico'=> 'required|string|max:255', 
            'nombre'=> 'required|string|max:255',
            'apellido'=> 'required|string|max:255',
            'cedula'=> 'required|string|max:255',
            'cargo'=> 'required|string|max:255',
            'foto'=> 'nullable',
            ]);
    
            //Crear una Etapa
            $tecnico = new Tecnico();
            $tecnico->cod_mecanico =$validateData['cod_mecanico'];
            $tecnico->nombre = $validateData['nombre'];    
            $tecnico->apellido = $validateData['apellido'];    
            $tecnico->cedula = $validateData['cedula'];    
            $tecnico->cargo = $validateData['cargo'];    
            $tecnico->foto = $validateData['foto']; 
            $tecnico->save();
    
            return redirect()->route('Tecnicos.store')->with('success', 'Tecnico creado correctamente.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Tecnico $tecnico)
    {
        return view('Tecnicos.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tecnico $tecnico)
    {
        return view('Tecnicos.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tecnico $tecnico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tecnico $tecnico)
    {
        //
    }
}