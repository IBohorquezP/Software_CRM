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
        $clientes = Cliente::all(); // Obtiene todos los clientes desde la base de datos
        return view('Clientes.index', compact('clientes')); // Pasa $clientes a la vista
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
    public function show ($id_cliente)
    {
        $cliente = Cliente::find($id_cliente);

        // Devuelve la vista 'clientes.show' pasando el cliente encontrado
        return view('Clientes.show', compact('cliente')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_cliente)
    {
        $cliente = Cliente::findorFail($id_cliente);
        return view('Clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_cliente)
    {
        $validateData = $request->validate([
            'nombre'=> 'required|string|max:255', 
            'tipo'=> 'required|string|max:255',
        ]);
    
        $cliente = Cliente::find($id_cliente);
        
        if (!$cliente) {
            return redirect()->route('Clientes.index')->with('error', 'Cliente no encontrado.');
        }
    
        $cliente->update($validateData);
    
        return redirect()->route('Clientes.show', $cliente->id_cliente)->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect('/Clientes.index');
    }
}