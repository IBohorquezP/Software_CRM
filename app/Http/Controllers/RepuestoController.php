<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use App\Models\Servicio;
use Illuminate\Http\Request;

class RepuestoController extends Controller
{

    public function create($id_servicio)
    {
        $servicio = Servicio::find($id_servicio);

        return view('Repuestos.create', compact('id_servicio', 'servicio'));
    }

    public function store(Request $request)
    {
        //Validacion de datos repuesto
        $validateData = $request->validate([
            'fecha_inicio_cotizacion' => 'nullable|date_format:Y-m-d|max:255',
            'fecha_fin_cotizacion' => 'nullable|date_format:Y-m-d|max:255',
            'contador_cotizacion' => 'nullable|string|max:255',
            'nro_orden' => 'nullable|string|max:255',
            'fecha_inicio_colocacion' => 'nullable|date_format:Y-m-d|max:255',
            'fecha_fin_colocacion' => 'nullable|date_format:Y-m-d|max:255',
            'contador_colocacion' => 'nullable|string|max:255',
            'id_servicio' => 'required|exists:servicios,id_servicio',

        ]);

        $repuestos = new Repuesto();
        $repuestos->fecha_inicio_cotizacion = $validateData['fecha_inicio_cotizacion'];
        $repuestos->fecha_fin_cotizacion = $validateData['fecha_fin_cotizacion'];
        $repuestos->contador_cotizacion = $validateData['contador_cotizacion'];
        $repuestos->nro_orden = $validateData['nro_orden'];
        $repuestos->fecha_inicio_colocacion = $validateData['fecha_inicio_colocacion'];
        $repuestos->fecha_fin_colocacion = $validateData['fecha_fin_colocacion'];
        $repuestos->contador_colocacion = $validateData['contador_colocacion'];
        $repuestos->servicios_id_servicio = $validateData['id_servicio'];
        $repuestos->save();
        return redirect()->route('Repuestos.show', [
            'id_servicio' => $repuestos->servicios_id_servicio,
            'id_repuesto' => $repuestos->id_repuesto
        ]);
    }

    public function show($id_servicio)
    {
        $servicio = Servicio::find($id_servicio);

        // Obtener todos los repuestos asociados al servicio
        $repuestos = Repuesto::where('servicios_id_servicio', $id_servicio)->get();

        // Pasar el servicio y los repuestos a la vista
        return view('Repuestos.show', compact('servicio', 'repuestos'));
    }

    public function edit($id_servicio, $id_repuesto)
    {
        // Buscar el servicio
        $servicio = Servicio::find($id_servicio);

        // Buscar el repuesto
        $repuesto = Repuesto::find($id_repuesto);

        // Pasar tanto el servicio como el repuesto a la vista
        return view('Repuestos.edit', compact('servicio', 'repuesto'));
    }

    public function update(Request $request, $id_servicio, $id_repuesto)
    {
        // Validación de los datos
        $validateData = $request->validate([
            'fecha_inicio_cotizacion' => 'nullable|date_format:Y-m-d|max:255',
            'fecha_fin_cotizacion' => 'nullable|date_format:Y-m-d|max:255',
            'contador_cotizacion' => 'nullable|string|max:255',
            'nro_orden' => 'nullable|string|max:255',
            'fecha_inicio_colocacion' => 'nullable|date_format:Y-m-d|max:255',
            'fecha_fin_colocacion' => 'nullable|date_format:Y-m-d|max:255',
            'contador_colocacion' => 'nullable|string|max:255',
        ]);

        // Buscar el repuesto
        $repuesto = Repuesto::find($id_repuesto);
        if (!$repuesto) {
            return redirect()->route('Repuestos.show', ['id_servicio' => $id_servicio])
                ->with('error', 'Repuesto no encontrado.');
        }

        // Actualizar los campos del repuesto
        $repuesto->fecha_inicio_cotizacion = $validateData['fecha_inicio_cotizacion'];
        $repuesto->fecha_fin_cotizacion = $validateData['fecha_fin_cotizacion'];
        $repuesto->contador_cotizacion = $validateData['contador_cotizacion'];
        $repuesto->nro_orden = $validateData['nro_orden'];
        $repuesto->fecha_inicio_colocacion = $validateData['fecha_inicio_colocacion'];
        $repuesto->fecha_fin_colocacion = $validateData['fecha_fin_colocacion'];
        $repuesto->contador_colocacion = $validateData['contador_colocacion'];
        $repuesto->save();

        return redirect()->route('Repuestos.show', ['id_servicio' => $id_servicio, 'id_repuesto' => $repuesto->id_repuesto])
            ->with('success', 'Repuesto actualizado correctamente.');
    }

    public function destroy($id_servicio, $id_repuesto)
    {
        // Buscar el repuesto
        $repuesto = Repuesto::find($id_repuesto);
        if (!$repuesto) {
            return redirect()->route('Repuestos.show', ['id_servicio' => $id_servicio])
                ->with('error', 'Repuesto no encontrado.');
        }
    
        // Eliminar el repuesto
        $repuesto->delete();
    
        // Redirigir de vuelta al servicio y mostrar un mensaje de éxito
        return redirect()->route('Repuestos.show', ['id_servicio' => $id_servicio])
            ->with('success', 'Repuesto eliminado correctamente.');
    }
}
