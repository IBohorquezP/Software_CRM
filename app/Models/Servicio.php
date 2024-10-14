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
        'cedula', 
        'serial',
        'componente',
        'servicio',
        'modelo',
        'horometro',
        'marca',
        'fecha_llegada',
        'requisitos',
        'nota',
    ];
}
