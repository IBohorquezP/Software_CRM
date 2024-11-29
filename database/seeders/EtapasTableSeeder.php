<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Etapa;

class EtapasTableSeeder extends Seeder
{
    public function run(): void
    {
        $etapa1 = new Etapa;
        $etapa1->nombre = 'Desarme y Evaluación';
        $etapa1->descripcion = 'Primera etapa del proceso donde se inspecciona el motor';
        $etapa1->foto = 'fotos/1732811087.jpeg';
        $etapa1->save();

        $etapa2 = new Etapa;
        $etapa2->nombre = 'Armado y Prueba';
        $etapa2->descripcion = 'Segunda etapa del proceso donde se arma y prueba el motor';
        $etapa2->foto = 'fotos/1732811099.jpeg';
        $etapa2->save();

        $etapa3 = new Etapa;
        $etapa3->nombre = 'Finalizado';
        $etapa3->descripcion = 'Ultima etapa del proceso, motor ya entregado al cliente';
        $etapa3->foto = 'fotos/1732811115.jpeg';
        $etapa3->save();
    }
}
