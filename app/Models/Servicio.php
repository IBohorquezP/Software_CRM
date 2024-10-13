<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial',
        'servicio',
        'componente',
        'modelo',
        'horometro',
        'marca',
        'fecha_llegada',
        'requisitos_cliente',
        'nota',
    ];
}
