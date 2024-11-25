<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Repuesto extends Model
{
    use HasFactory;
    protected $table = 'repuestos';
    protected $primaryKey = 'id_repuesto';

    public function servicios(): BelongsToMany
    {
        return $this->belongsToMany(Servicio::class, 'servicios_repuestos', 'id_servicio', 'id_repuesto');
    }
}
