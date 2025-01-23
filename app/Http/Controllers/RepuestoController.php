<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use App\Models\Servicio;
use Illuminate\Http\Request;

class RepuestoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:Admin')->only('create', 'edit', 'destroy');
    // }

    public function create($id_servicio)
    {
        $servicio = Servicio::find($id_servicio);
        return view('Repuestos.create', compact('id_servicio', 'servicio'));
    }

    public function store(Request $request)
    {
        // Validación de datos
        $validateData = $request->validate([
            'fecha_inicio_cotizacion' => 'nullable|date_format:Y-m-d|max:255',
            'fecha_fin_cotizacion' => 'nullable|date_format:Y-m-d|max:255',
            'nro_cotizacion' => 'nullable|string|max:255',
            'fecha_inicio_colocacion' => 'nullable|date_format:Y-m-d|max:255',
            'fecha_fin_colocacion' => 'nullable|date_format:Y-m-d|max:255',
            'nro_orden' => 'nullable|string|max:255',
            'id_servicio' => 'required|exists:servicios,id_servicio',
        ]);

        $repuesto = new Repuesto();
        $repuesto->fecha_inicio_cotizacion = $validateData['fecha_inicio_cotizacion'];
        $repuesto->fecha_fin_cotizacion = $validateData['fecha_fin_cotizacion'];
        $repuesto->nro_cotizacion = $validateData['nro_cotizacion'];
        $repuesto->contador_cotizacion = $this->calculateCounter($validateData['fecha_inicio_cotizacion'], $validateData['fecha_fin_cotizacion']);
        $repuesto->fecha_inicio_colocacion = $validateData['fecha_inicio_colocacion'];
        $repuesto->fecha_fin_colocacion = $validateData['fecha_fin_colocacion'];
        $repuesto->nro_orden = $validateData['nro_orden'];
        $repuesto->contador_colocacion = $this->calculateCounter($validateData['fecha_inicio_colocacion'], $validateData['fecha_fin_colocacion']);
        $repuesto->servicios_id_servicio = $validateData['id_servicio'];
        $repuesto->save();

        return redirect()->route('Repuestos.show', [
            'id_servicio' => $repuesto->servicios_id_servicio,
            'id_repuesto' => $repuesto->id_repuesto,
        ]);
    }

    public function show($id_servicio)
    {
        $servicio = Servicio::find($id_servicio);

        // Obtener los repuestos para el servicio y formatear las fechas
        $repuestos = Repuesto::where('servicios_id_servicio', $id_servicio)->get()->map(function ($repuesto) {
            $repuesto->fecha_inicio_cotizacion = $repuesto->fecha_inicio_cotizacion
                ? \Carbon\Carbon::parse($repuesto->fecha_inicio_cotizacion)->format('Y-m-d')
                : null;
            $repuesto->fecha_fin_cotizacion = $repuesto->fecha_fin_cotizacion
                ? \Carbon\Carbon::parse($repuesto->fecha_fin_cotizacion)->format('Y-m-d')
                : null;
            $repuesto->fecha_inicio_colocacion = $repuesto->fecha_inicio_colocacion
                ? \Carbon\Carbon::parse($repuesto->fecha_inicio_colocacion)->format('Y-m-d')
                : null;
            $repuesto->fecha_fin_colocacion = $repuesto->fecha_fin_colocacion
                ? \Carbon\Carbon::parse($repuesto->fecha_fin_colocacion)->format('Y-m-d')
                : null;
            return $repuesto;
        });
        $id_etapa = $servicio->etapa->id_etapa;
        // Pasar los datos a la vista
        return view('Repuestos.show', compact('servicio', 'repuestos','id_etapa'));
    }

    public function edit($id_servicio, $id_repuesto)
    {
        $servicio = Servicio::find($id_servicio);
        $repuesto = Repuesto::find($id_repuesto);
        return view('Repuestos.edit', compact('servicio', 'repuesto'));
    }

    public function update(Request $request, $id_servicio, $id_repuesto)
    {
        $validateData = $request->validate([
            'fecha_inicio_cotizacion' => 'nullable|date_format:Y-m-d|max:255',
            'fecha_fin_cotizacion' => 'nullable|date_format:Y-m-d|max:255',
            'nro_cotizacion' => 'nullable|string|max:255',
            'fecha_inicio_colocacion' => 'nullable|date_format:Y-m-d|max:255',
            'fecha_fin_colocacion' => 'nullable|date_format:Y-m-d|max:255',
            'nro_orden' => 'nullable|string|max:255',
        ]);

        $repuesto = Repuesto::find($id_repuesto);
        if (!$repuesto) {
            return redirect()->route('Repuestos.show', ['id_servicio' => $id_servicio])
                ->with('error', 'Repuesto no encontrado.');
        }

        $repuesto->fecha_inicio_cotizacion = $validateData['fecha_inicio_cotizacion'];
        $repuesto->fecha_fin_cotizacion = $validateData['fecha_fin_cotizacion'];
        $repuesto->nro_cotizacion = $validateData['nro_cotizacion'];
        $repuesto->contador_cotizacion = $this->calculateCounter($validateData['fecha_inicio_cotizacion'], $validateData['fecha_fin_cotizacion']);
        $repuesto->fecha_inicio_colocacion = $validateData['fecha_inicio_colocacion'];
        $repuesto->fecha_fin_colocacion = $validateData['fecha_fin_colocacion'];
        $repuesto->nro_orden = $validateData['nro_orden'];
        $repuesto->contador_colocacion = $this->calculateCounter($validateData['fecha_inicio_colocacion'], $validateData['fecha_fin_colocacion']);
        $repuesto->save();

        return redirect()->route('Repuestos.show', ['id_servicio' => $id_servicio, 'id_repuesto' => $repuesto->id_repuesto])
            ->with('success', 'Repuesto actualizado correctamente.');
    }

    public function destroy($id_servicio, $id_repuesto)
    {
        $repuesto = Repuesto::find($id_repuesto);
        if (!$repuesto) {
            return redirect()->route('Repuestos.show', ['id_servicio' => $id_servicio])
                ->with('error', 'Repuesto no encontrado.');
        }

        $repuesto->delete();
        return redirect()->route('Repuestos.show', ['id_servicio' => $id_servicio])
            ->with('success', 'Repuesto eliminado correctamente.');
    }

    /**
     * Calcula la diferencia en días entre dos fechas.
     */
    private function calculateCounter($startDate, $endDate)
    {
        if ($startDate && $endDate) {
            return \Carbon\Carbon::parse($endDate)->diffInDays($startDate, false);
        }
        return 0; // Si no hay fechas, el contador es 0
    }
}
