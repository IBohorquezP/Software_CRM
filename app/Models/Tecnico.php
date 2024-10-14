<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;

    protected $table = 'tecnicos';

    protected $fillable = [
        'id_tecnico',
        'nombre',
        'apellido',
        'cedula',
        'correo',
        'marca',
        'foto',
        'cargo',
    ];
}
