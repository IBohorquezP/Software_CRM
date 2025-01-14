<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'nombre',
        'tipo',
        'foto',
    ];
    public function servicios()
{
    return $this->hasMany(Servicio::class, 'clientes_id_cliente', 'id_cliente');
}
}
