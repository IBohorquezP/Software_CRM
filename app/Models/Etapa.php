<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    use HasFactory;
    protected $table = 'etapas';

    protected $fillable = [
        'id_etapa',
        'servicios_id_servicio',
        'numero_etapa',
        'tipo_etapa',
    ];
}
