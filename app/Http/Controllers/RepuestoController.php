<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use App\Models\Servicio;
use App\Models\ServiciosRepuestos;
use Illuminate\Http\Request;

class RepuestoController extends Controller
{

    public function create($id_servicio)
    {
        $repuestos = Repuesto::all();
        $servicio = Servicio::find($id_servicio);

        return view('Repuestos.create', compact('repuestos', 'id_servicio', 'servicio'));
    }

    public function store(Request $request)
    {
        //Validacion de datos repuesto
        $validateData = $request->validate([
            'fecha_inicio_cotizacion' => 'required|date_format:Y/m/d|max:255',
            'fecha_fin_cotizacion' => 'nullable|date_format:Y/m/d|max:255',
            'contador_cotizacion' => 'nullable|string|max:255',
            'nro_orden' => 'nullable|string|max:255',
            'fecha_inicio_colocacion' => 'nullable|date_format:Y/m/d|max:255',
            'fecha_fin_colocacion' => 'nullable|date_format:Y/m/d|max:255',
            'contador_colocacion' => 'nullable|string|max:255',
        ]);

        $servicio = Servicio::findOrFail($validateData['id_servicio']);
        if ($servicio->repuestos()->where('repuestos_id_repuesto', $validateData['id_repuesto'])->exists()) {
            return redirect()->route('Repuestos.create', ['id_servicio' => $validateData['id_servicio']])
                ->with('error', 'El repuesto ya está asignada a este servicio.');
        }

        //Crear un repuesto
        $servicio->repuestos()->attach($validateData['id_repuesto'], [
            'fecha_inicio_cotizacion' => $validateData['fecha_inicio_cotizacion'] ?? null,
            'fecha_fin_cotizacion' => $validateData['fecha_fin_cotizacion'] ?? null,
            'contador_cotizacion' => $validateData['contador_cotizacion'] ?? null,
            'nro_orden' => $validateData['nro_orden'] ?? null,
            'fecha_inicio_colocacion' => $validateData['fecha_inicio_colocacion'] ?? null,
            'fecha_fin_colocacion' => $validateData['fecha_fin_colocacion'] ?? null,
            'contador_colocacion' => $validateData['contador_colocacion'] ?? null,
        ]);

        return redirect()->route('Repuestos.create', ['id_servicio' => $validateData['id_servicio']])
            ->with('success', 'Bahía asignada exitosamente al servicio.');
    }

    public function show($id_servicio_repuesto)
    {
        $servicio = Servicio::find($id_servicio_repuesto);
        $servicio_existentes = ServiciosRepuestos::where('servicios_id_servicio', $servicio->id_servicio)->get();
        return view('Repuestos.show', compact('servicio_existentes', 'servicio'));
    }

    public function edit(Request $repuestos)
    {
        return view('Repuestos.edit');
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy(Request $repuestos)
    {
        //
    }
}
