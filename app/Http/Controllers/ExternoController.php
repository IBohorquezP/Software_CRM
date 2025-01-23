<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Externo;

class ExternoController extends Controller
{
    public function create($id_servicio)
    {
        $servicio = Servicio::find($id_servicio);
        return view('Externos.create', compact('id_servicio', 'servicio'));
    }

    public function store(Request $request)
    {
        // Validación de datos
        $validateData = $request->validate([
            'proveedor' => 'nullable|string|max:255',
            'componente' => 'nullable|string|max:255',
            'serial' => 'nullable|string|max:255',
            'cantidad' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'ot' => 'nullable|string|max:255',
            'fecha_salida' => 'nullable|date_format:Y-m-d|max:255',
            'fecha_llegada' => 'nullable|date_format:Y-m-d|max:255',
            'id_servicio' => 'required|exists:servicios,id_servicio',
        ]);

        // Crear instancia del modelo Externo
        $externo = new Externo();
        $externo->proveedor = $validateData['proveedor'];
        $externo->componente = $validateData['componente'];
        $externo->serial = $validateData['serial'];
        $externo->cantidad = $validateData['cantidad'];
        $externo->descripcion = $validateData['descripcion'];
        $externo->ot = $validateData['ot'];
        $externo->fecha_salida = $validateData['fecha_salida'];
        $externo->fecha_llegada = $validateData['fecha_llegada'];

        // Calcular el contador basado en las fechas de salida y llegada
        $externo->contador = $this->calculateCounter($validateData['fecha_salida'], $validateData['fecha_llegada']);

        $externo->servicios_id_servicio = $validateData['id_servicio'];
        $externo->save();

        // Redirigir a la vista de detalles del Externo
        return redirect()->route('Externos.show', [
            'id_servicio' => $externo->servicios_id_servicio,
            'id_externo' => $externo->id_externo,
        ]);
    }

    public function show($id_servicio)
    {
        $servicio = Servicio::find($id_servicio);
        $externos = Externo::where('servicios_id_servicio', $id_servicio)->get()->map(function ($externo) {
            $externo->fecha_salida = $externo->fecha_salida
                ? \Carbon\Carbon::parse($externo->fecha_salida)->format('Y-m-d')
                : null;
            $externo->fecha_llegada = $externo->fecha_llegada
                ? \Carbon\Carbon::parse($externo->fecha_llegada)->format('Y-m-d')
                : null;
            return $externo;
        });
        $id_etapa = $servicio->etapa->id_etapa;

        return view('Externos.show', compact('servicio', 'externos', 'id_etapa'));
    }
    public function edit($id_servicio, $id_externo)
    {
        $servicio = Servicio::find($id_servicio);
        $externo = Externo::find($id_externo);
        return view('Externos.edit', compact('servicio', 'externo'));
    }

    public function update(Request $request, $id_servicio, $id_externo)
    {
        // Validación de datos
        $validateData = $request->validate([
            'proveedor' => 'nullable|string|max:255',
            'componente' => 'nullable|string|max:255',
            'serial' => 'nullable|string|max:255',
            'cantidad' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'ot' => 'nullable|string|max:255',
            'fecha_salida' => 'nullable|date_format:Y-m-d|max:255',
            'fecha_llegada' => 'nullable|date_format:Y-m-d|max:255',
        ]);

        // Buscar el registro de Externo
        $externo = Externo::find($id_externo);
        if (!$externo) {
            return redirect()->route('Externos.show', ['id_servicio' => $id_servicio])
                ->with('error', 'Registro no encontrado.');
        }

        // Actualizar los campos del modelo
        $externo->proveedor = $validateData['proveedor'];
        $externo->componente = $validateData['componente'];
        $externo->serial = $validateData['serial'];
        $externo->cantidad = $validateData['cantidad'];
        $externo->descripcion = $validateData['descripcion'];
        $externo->ot = $validateData['ot'];
        $externo->fecha_salida = $validateData['fecha_salida'];
        $externo->fecha_llegada = $validateData['fecha_llegada'];

        // Recalcular el contador basado en las fechas de salida y llegada
        $externo->contador = $this->calculateCounter($validateData['fecha_salida'], $validateData['fecha_llegada']);

        $externo->save();

        // Redirigir a la vista de detalles del Externo
        return redirect()->route('Externos.show', [
            'id_servicio' => $id_servicio,
            'id_externo' => $externo->id_externo,
        ])->with('success', 'Registro actualizado correctamente.');
    }

    public function destroy($id_servicio, $id_externo)
    {
        $externo = Externo::find($id_externo);
        if (!$externo) {
            return redirect()->route('Externos.show', ['id_servicio' => $id_servicio])
                ->with('error', 'Trabajo Externo no encontrado.');
        }

        $externo->delete();
        return redirect()->route('Externos.show', ['id_servicio' => $id_servicio])
            ->with('success', 'Trabajo Externo eliminado correctamente.');
    }
    private function calculateCounter($startDate, $endDate)
    {
        if ($startDate && $endDate) {
            return \Carbon\Carbon::parse($endDate)->diffInDays($startDate, false);
        }
        return 0; // Si no hay fechas, el contador es 0
    }
}
