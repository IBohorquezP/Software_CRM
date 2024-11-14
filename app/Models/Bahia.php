<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bahia extends Model
{
    use HasFactory;
    protected $table = 'bahias';
    protected $primaryKey = 'id_bahia';

    protected $fillable = [
        'nombre',
        'img',
        'descripcion',
    ];
    public function servicios(): BelongsToMany
    {
        return $this->belongsToMany(Servicio::class, 'servicios_bahias','id_servicio','id_bahia');
    }
}
