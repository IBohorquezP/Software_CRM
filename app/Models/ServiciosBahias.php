<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosBahias extends Model
{
    protected $table = 'servicios_bahias';
    protected $primaryKey = 'id_servicio_bahia';
    
    protected $fillable = [
        'id_servicio_bahia',
        'bahias_id_bahia',
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