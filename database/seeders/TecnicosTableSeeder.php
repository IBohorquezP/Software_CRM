<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tecnico;

class TecnicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tecnico1 = new Tecnico;
        $tecnico1->cod_mecanico = '12345';
        $tecnico1->nombre = 'Reinaldo';
        $tecnico1->apellido = 'Raimondo';
        $tecnico1->cedula = '12345678';
        $tecnico1->foto = 'fotos/1732890721.jpeg';
        $tecnico1->cargo = 'Técnico de Planta';
        $tecnico1->save();
    }
}
