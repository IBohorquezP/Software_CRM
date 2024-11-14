<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';
    protected $primaryKey = 'id_servicio';

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
        'fecha_salida_estimada',
        'fecha_salida_real',
        'contador',
        'requisitos',
        'nota',
    ];

    public function cliente()
    {
    return $this->belongsTo(Cliente::class, 'clientes_id_cliente');
    }

    public function etapa()
    {
        return $this->belongsTo(Etapa::class, 'etapas_id_etapa');
    }
    
    public function bahias():BelongsToMany
    {
        return $this->belongsToMany(Bahia::class, 'servicios_bahias')
        ->withPivot(['TRG', 'fecha_inicio', 'fecha_fin', 'alcance', 'herramienta', 'documentacion', 'requerimientos', 'actividad']);
    }

    public function tecnicos():BelongsToMany
    {
        return $this->belongsToMany(Tecnico::class, 'servicios_tecnicos', 'tecnicos_id_tecnico', 'servicios_id_servicio');
    }
}
