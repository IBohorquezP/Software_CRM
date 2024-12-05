<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;


class Repuesto extends Model
{
    use HasFactory, SoftDeletes;
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

    public function getContadorCotizacionAttribute()
    {
        if ($this->fecha_inicio_cotizacion && $this->fecha_fin_cotizacion) {
            return \Carbon\Carbon::parse($this->fecha_fin_cotizacion)
                ->diffInDays($this->fecha_inicio_cotizacion, false);
        }
        return $this->contador_cotizacion ?? 0; // Valor por defecto si no hay fechas
    }

    // Accessor para contador de colocación
    public function getContadorColocacionAttribute()
    {
        if ($this->fecha_inicio_colocacion && $this->fecha_fin_colocacion) {
            return \Carbon\Carbon::parse($this->fecha_fin_colocacion)
                ->diffInDays($this->fecha_inicio_colocacion, false);
        }
        return $this->contador_colocacion ?? 0; // Valor por defecto si no hay fechas
    }

    public function servicios()
    {
        return $this->belongsTo(Servicio::class, 'servicios_id_servicio', 'id_servicio');
    }
    
}
