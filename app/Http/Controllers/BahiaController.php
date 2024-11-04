<?php

namespace App\Http\Controllers;

use App\Models\Bahia;
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
        'img'=> 'nullable', 
        'descripcion'=> 'required|string|max:255',
        ]);

        //Crear un Cliente
        $bahia = new Bahia();
        $bahia->nombre =$validateData['nombre'] ;
        $bahia->img = $validateData['img'];
        $bahia->descripcion = $validateData['descripcion'];    
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
    public function destroy(Bahia $bahia)
    {
        //
    }

    public function asignarBahias(){
        return view('Bahias.asignarBahias');
    }
    // public function asignarBahias($id_servicio){
    //     return view('Bahias.asignarBahias');
    // }
}