<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosRepuestos extends Model
{
    protected $table = 'servicios_repuestos';
    protected $primaryKey = 'id_servicio_repuesto';

    protected $fillable = [
        'id_servicio_repuesto',
        'repuestos_id_repuesto',
        'servicios_id_servicio',
        'fecha_inicio_cotizacion',
        'fecha_fin_cotizacion',
        'contador_cotizacion',
        'nro_orden',
        'fecha_inicio_colocacion',
        'fecha_fin_colocacion',
        'contador_colocacion',

    ];

    public function repuesto()
    {
        return $this->belongsTo(Repuesto::class, 'repuestos_id_repuesto', 'id_repuesto');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicios_id_servicio', 'id_servicio');
    }
    use HasFactory;
}
