<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{

    public function reporteServicio($id_servicio)
    {
        $servicio = Servicio::findOrFail($id_servicio);

        // Formatear las fechas antes de incluirlas en el arreglo
        $fecha_llegada = \Carbon\Carbon::parse($servicio->fecha_llegada)->format('d/m/Y');
        $fecha_inicio_estimada = \Carbon\Carbon::parse($servicio->fecha_inicio_estimada)->format('d/m/Y');
        $fecha_de_despacho = \Carbon\Carbon::parse($servicio->fecha_de_despacho)->format('d/m/Y');
        $fecha_salida_estimada = \Carbon\Carbon::parse($servicio->fecha_salida_estimada)->format('d/m/Y');
        $fecha_salida_real = \Carbon\Carbon::parse($servicio->fecha_salida_real)->format('d/m/Y');

        $data = [
            'nombre_cliente' => $servicio->cliente->nombre,
            'nombre_etapa' => $servicio->etapa->nombre,
            'servicio' => [
                'serial' => $servicio->serial,
                'servicio' => $servicio->servicio,
                'componente' => $servicio->componente,
                'modelo' => $servicio->modelo,
                'marca' => $servicio->marca,
                'horometro' => $servicio->horometro,
                'fecha_llegada' => $fecha_llegada,
                'fecha_inicio_estimada' => $fecha_inicio_estimada,
                'fecha_de_despacho' => $fecha_de_despacho,
                'fecha_salida_estimada' => $fecha_salida_estimada,
                'fecha_salida_real' => $fecha_salida_real,
                'contador' => $servicio->contador,
                'requisito' => $servicio->requisito,
                'nota' => $servicio->nota,
            ],
            'bahias' => implode(', ', $servicio->bahias->pluck('nombre')->toArray()), // Bahías
            'tecnicos' => implode(', ', $servicio->tecnicos->map(function ($tecnico) {
                return $tecnico->nombre . ' ' . $tecnico->apellido;
            })->toArray()), // Técnicos
            'repuestos' => implode(', ', $servicio->repuestos->pluck('nro_orden')->toArray()), 
            'externos' => implode(', ', $servicio->externos->pluck('componente')->toArray()), 
        ];

        // Generar el PDF
        $pdf = Pdf::loadView('Servicios.reporteServicio', $data);

        return $pdf->stream('ReporteServicio.pdf');
    }


    public function reporteServicioBahias($id_servicio, $id_bahia)
    {
        $servicio = Servicio::findOrFail($id_servicio);
        $bahia = $servicio->bahias()->findOrFail($id_bahia);
        $data = [
            'nombre_cliente' => $servicio->cliente->nombre,
            'servicio' => [
                'servicio' => $servicio->servicio,
                'modelo' => $servicio->modelo,
                'serial' => $servicio->serial
            ],
        ];

        $pdf = Pdf::loadView('Bahias.reporteServicioBahias', $data, compact('servicio', 'bahia'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('ReporteBahia.pdf');
    }
}
