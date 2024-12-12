<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Cliente;
use App\Models\Etapa;
use App\Models\Bahia;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::with(['etapa', 'cliente', 'bahias'])->get();

        return view('Servicios.index', compact('servicios'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $etapas = Etapa::all();
        $bahias = Bahia::all();
        $tecnicos = Tecnico::all();

        return view('Servicios.create', compact('clientes', 'etapas', 'bahias', 'tecnicos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'serial' => 'required|string|max:255',
            'servicio' => 'required|string|max:255',
            'componente' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'marca' => 'nullable|string',
            'horometro' => 'nullable|string',
            'fecha_llegada' => 'required|date_format:Y-m-d',
            'fecha_salida_estimada' => 'nullable|date_format:Y-m-d',
            'fecha_salida_real' => 'nullable|date_format:Y-m-d',
            'requisito' => 'nullable|string',
            'nota' => 'nullable|string',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_etapa' => 'required|exists:etapas,id_etapa',
        ]);

        $servicio = new Servicio($validatedData);

        $servicio->clientes_id_cliente = $validatedData['id_cliente'];
        $servicio->etapas_id_etapa = $validatedData['id_etapa'];

        $servicio->contador = $this->calcularDiferenciaDias(
            $validatedData['fecha_salida_estimada'] ?? null,
            $validatedData['fecha_salida_real'] ?? null
        );

        $servicio->save();

        return redirect()->route('Bahias.asignarBahias', ['id_servicio' => $servicio->id_servicio])
            ->with('success', 'Servicio creado correctamente.');
    }

    public function show($id_servicio)
    {
        $servicio = Servicio::with('cliente', 'etapa')->findOrFail($id_servicio);
        $clientes = Cliente::all();
        $etapas = Etapa::all();

        return view('Servicios.show', compact('servicio', 'clientes', 'etapas'));
    }

    public function edit($id_servicio)
    {
        $servicio = Servicio::with('cliente', 'etapa')->findOrFail($id_servicio);
        $clientes = Cliente::all();
        $etapas = Etapa::all();

        return view('Servicios.edit', compact('servicio', 'clientes', 'etapas'));
    }

    public function update(Request $request, $id_servicio)
    {
        $validatedData = $request->validate([
            'serial' => 'required|string|max:255',
            'servicio' => 'required|string|max:255',
            'componente' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'marca' => 'nullable|string',
            'horometro' => 'nullable|string',
            'fecha_llegada' => 'required|date_format:Y-m-d',
            'fecha_salida_estimada' => 'nullable|date_format:Y-m-d',
            'fecha_salida_real' => 'nullable|date_format:Y-m-d',
            'requisito' => 'nullable|string|max:255',
            'nota' => 'nullable|string|max:255',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_etapa' => 'required|exists:etapas,id_etapa',
        ]);

        $servicio = Servicio::findOrFail($id_servicio);
        $servicio->fill($validatedData);

        // Asignar manualmente
        $servicio->clientes_id_cliente = $validatedData['id_cliente'];
        $servicio->etapas_id_etapa = $validatedData['id_etapa'];

        // Recalcular el campo 'contador'
        $servicio->contador = $this->calcularDiferenciaDias(
            $validatedData['fecha_salida_estimada'] ?? null,
            $validatedData['fecha_salida_real'] ?? null
        );

        $servicio->save();

        return redirect()->route('Servicios.show', $servicio->id_servicio)
            ->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy($id_servicio)
    {
        $servicio = Servicio::findOrFail($id_servicio);
        $servicio->delete();

        return redirect()->route('Servicios.index')
            ->with('success', 'El servicio ha sido eliminado correctamente.');
    }

    /**
     * Calcula la diferencia de días entre dos fechas.
     *
     * @param string|null $fechaEstimada
     * @param string|null $fechaReal
     * @return int|null
     */
    private function calcularDiferenciaDias($fechaEstimada, $fechaReal)
    {
        if ($fechaEstimada && $fechaReal) {
            $fechaEstimada = Carbon::create($fechaEstimada);
            $fechaReal = Carbon::create($fechaReal);

            return $fechaReal->diffInDays($fechaEstimada, false); // False para diferencias negativas
        }

        return null;
    }
}
