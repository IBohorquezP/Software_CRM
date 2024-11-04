<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
