<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tecnico extends Model
{
    use HasFactory;

    protected $table = 'tecnicos';
    protected $primaryKey = 'id_tecnico';

    protected $fillable = [
        'cod_mecanico',
        'nombre',
        'apellido',
        'cedula',
        'cargo',
        'foto',
    ];

    public function servicios(): BelongsToMany
    {
        return $this->belongsToMany(Servicio::class, 'servicio_tecnico'); // 'servicio_tecnico' es el nombre de la tabla intermedia
    }
}
