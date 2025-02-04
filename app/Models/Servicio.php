<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Servicio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'servicios';
    protected $primaryKey = 'id_servicio';
    protected $dates = ['fecha_salida_estimada', 'fecha_salida_real','fecha_inicio_estimada','fecha_de_despacho'];

    protected $fillable = [
        'clientes_id_cliente',
        'etapas_id_etapa',
        'serial',
        'servicio',
        'componente',
        'modelo',
        'horometro',
        'marca',
        'fecha_llegada',
        'fecha_inicio_estimada',
        'fecha_de_despacho',
        'fecha_salida_estimada',
        'fecha_salida_real',
        'contador',
        'requisito',
        'nota',
    ];


    public function cliente()
    {
    return $this->belongsTo(Cliente::class, 'clientes_id_cliente')->withTrashed();
    }


    public function etapa()
    {
        return $this->belongsTo(Etapa::class, 'etapas_id_etapa');
    }
    

    public function bahias(): BelongsToMany
    {
        return $this->belongsToMany(
            Bahia::class,
            'servicios_bahias', 
            'servicios_id_servicio', 
            'bahias_id_bahia' 
        )->withPivot(['TRG', 'fecha_inicio', 'fecha_fin', 'alcance', 'herramienta', 'documentacion', 'requerimientos', 'actividad','nro_de_tecnicos','servicios_id_servicio'])->withTrashed();
    }


    public function repuestos()
    {
        return $this->hasMany(Repuesto::class, 'servicios_id_servicio', 'id_servicio');
    }

    public function externos()
    {
        return $this->hasMany(Externo::class, 'servicios_id_servicio', 'id_servicio');
    }



    public function tecnicos():BelongsToMany
    {
        return $this->belongsToMany(Tecnico::class, 'servicios_tecnicos', 'servicios_id_servicio', 'tecnicos_id_tecnico')->withTrashed();
    }

    public function diferenciaFechasSalida()
    {
        $fechaSalidaEstimada = $this->fecha_salida_estimada ? Carbon::create($this->fecha_salida_estimada) : null;
        $fechaSalidaReal = $this->fecha_salida_real ? Carbon::create($this->fecha_salida_real) : null;

        if ($fechaSalidaEstimada && $fechaSalidaReal) {
            return $fechaSalidaReal->diffInDays($fechaSalidaEstimada, false); // False para incluir negativos
        }

        return null; // Si falta alguna de las fechas
    }
}
