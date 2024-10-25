<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';

    protected $fillable = [
        'id_servicio',
        'clientes_id_cliente',
        'serial',
        'servicio',
        'componente',
        'modelo',
        'horometro',
        'marca',
        'fecha_llegada',
        'fecha_salida_estimada',
        'fecha_salida_real',
        'requisitos',
        'nota',
    ];
}
