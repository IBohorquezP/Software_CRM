<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Repuesto extends Model
{
    use HasFactory;
    protected $table = 'repuestos';
    protected $primaryKey = 'id_repuesto';

    protected $fillable = [
        'fecha_inicio_cotizacion',
        'fecha_fin_cotizacion',
        'contador_cotizacion',
        'nro_orden',
        'fecha_inicio_colocacion',
        'fecha_fin_colocacion',
        'contador_colocacion',
        'servicios_id_servicio',
    ];

    public function servicios()
    {
        return $this->belongsTo(Servicio::class, 'servicios_id_servicio', 'id_servicio');
    }
}
