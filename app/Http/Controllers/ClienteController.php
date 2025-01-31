<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('role:Admin')->only('create','edit','destroy');
    // }

    public function index()
    {

        $clientes = Cliente::all(); // Obtiene todos los clientes desde la base de datos
        return view('Clientes.index', compact('clientes')); // Pasa $clientes a la vista
    }


    public function create()
    {
        return view('Clientes.create');
    }


    public function store(Request $request)
    {
        //Validacion de datos cliente
        $validateData = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //Crear un Cliente
        $cliente = new Cliente();
        $cliente->nombre = $validateData['nombre'];
        $cliente->tipo = $validateData['tipo'];
        $cliente->foto = $validateData['foto'] ?? null;


        if ($request->hasFile('foto')) {
            // Obtener el archivo
            $file = $request->file('foto');
            // Crear un nombre único para la imagen
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // Mover el archivo a la carpeta 'public/fotos'
            $file->move(public_path('fotos'), $filename);
            // Guardar el nombre de la imagen en la base de datos
            $cliente->foto = 'fotos/' . $filename;
        }
        $cliente->save();

        return redirect()->route('Clientes.store')->with('success', 'Cliente creado correctamente.');
    }


    public function show($id_cliente)
    {
        $cliente = Cliente::find($id_cliente);

        // Devuelve la vista 'clientes.show' pasando el cliente encontrado
        return view('Clientes.show', compact('cliente'));
    }


    public function edit($id_cliente)
    {
        $cliente = Cliente::findorFail($id_cliente);
        return view('Clientes.edit', compact('cliente'));
    }


    public function update(Request $request, $id_cliente)
    {
        $validateData = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'img' => 'nullable',
        ]);

        $cliente = Cliente::find($id_cliente);

        if (!$cliente) {
            return redirect()->route('Clientes.index')->with('error', 'Cliente no encontrado.');
        }

        $cliente->update($validateData);

        return redirect()->route('Clientes.show', $cliente->id_cliente)->with('success', 'Cliente actualizado correctamente.');
    }


    public function destroy($id_cliente)
    {
        // Encuentra el cliente por su ID
        $cliente = Cliente::findOrFail($id_cliente);

        // Realiza un Soft Delete
        $cliente->delete();

        // Redirige al índice con un mensaje de éxito
        return redirect()->route('Clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
