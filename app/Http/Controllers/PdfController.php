<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{

    public function reporteServicio($id_servicio)
    {
        $servicio = Servicio::findOrFail($id_servicio);
        $bahias = $servicio->bahias; // Obtener las bahías asociadas al servicio

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
                'fecha_llegada' => $servicio->fecha_llegada,
                'fecha_salida_estimada' => $servicio->fecha_salida_estimada,
                'fecha_salida_real' => $servicio->fecha_salida_real,
                'contador' => $servicio->contador,
                'requisito' => $servicio->requisito,
                'nota' => $servicio->nota,
            ],
            'bahias' => implode(', ', $servicio->bahias->pluck('nombre')->toArray()), // Concatenar las bahías con comas
        ];

        // Asegúrate de pasar correctamente los datos a la vista
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
