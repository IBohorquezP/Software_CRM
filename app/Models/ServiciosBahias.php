<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosBahias extends Model
{
    protected $table = 'servicios_bahias';

    protected $fillable = [
        'id',
        'servicios_id_bahia',
        'servicios_id_servicio',
        'TRG', 
        'fecha_inicio', 
        'fecha_fin', 
        'alcance', 
        'herramienta', 
        'documentacion', 
        'requerimientos', 
        'actividad'
];

    public function bahia(){
        return $this->belongsTo(Bahia::class, 'bahias_id_bahia', 'id_bahia');
    }
    
    public function servicio(){
        return $this->belongsTo(Servicio::class, 'servicios_id_servicio', 'id_servicio');
    }
    use HasFactory;
}