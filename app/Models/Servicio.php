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
    // public function tecnicos(): BelongsToMany
    // {
    //     return $this->belongsToMany(Tecnico::class, 'servicio_tecnico'); // 'servicio_tecnico' es el nombre de la tabla intermedia
    // }
}
