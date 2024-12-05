<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function reporteServicioBahias($id_servicio, $id_bahia){
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

        $pdf = Pdf::loadView('Servicios.reporteServicioBahias', $data, compact('servicio', 'bahia'))
        ->setPaper('a4', 'landscape');
    
        return $pdf->stream('ReporteBahia.pdf');

    }
}
