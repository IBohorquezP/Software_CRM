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
    public function servicios()
{
    return $this->belongsToMany(Servicio::class, 'servicios_tecnicos', 'tecnicos_id_tecnico', 'servicios_id_servicio');
}

}
