<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validacion de datos cliente
        $validateData = $request->validate([
        'nombre'=> 'required|string|max:255', 
        'tipo'=> 'required|string|max:255',
        ]);

        //Crear un Cliente
        $cliente = new Cliente();
        $cliente->nombre =$validateData['nombre'] ;
        $cliente->tipo = $validateData['tipo'];    
        $cliente->save();

        return redirect()->route('Clientes.store')->with('success', 'Cliente creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('Clientes.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('Clientes.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}