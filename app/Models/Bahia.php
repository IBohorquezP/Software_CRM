<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahia extends Model
{
    use HasFactory;
    protected $table = 'bahias';

    protected $fillable = [
        'id_bahia',
        'nombre',
        'img',
        'descripcion',
    ];
}
