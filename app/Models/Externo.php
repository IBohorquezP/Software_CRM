<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;


class Externo extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id_externo';
    protected $table = 'externos';

    protected $fillable = [
        'proveedor',
        'componente',
        'serial',
        'cantidad',
        'ot',
        'fecha_salida',
        'fecha_recepcion',
        'contador',
        'servicios_id_servicio',
    ];

    public function getContadorAttribute()
    {
        if ($this->fecha_salida && $this->fecha_llegada) {
            return \Carbon\Carbon::parse($this->fecha_llegada)
                ->diffInDays($this->fecha_salida, false);
        }
        return $this->contador ?? 0; // Valor por defecto si no hay fechas
    }
    public function servicios()
    {
        return $this->belongsTo(Servicio::class, 'servicios_id_servicio', 'id_servicio');
    }
}
