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

        $tecnico2 = new Tecnico;
        $tecnico2->cod_mecanico = '12345';
        $tecnico2->nombre = 'Elvis';
        $tecnico2->apellido = 'Pinto';
        $tecnico2->cedula = '12345678';
        $tecnico2->foto = 'fotos/1732907221.jpeg';
        $tecnico2->cargo = 'Técnico de Planta';
        $tecnico2->save();

        $tecnico3 = new Tecnico;
        $tecnico3->cod_mecanico = '12345';
        $tecnico3->nombre = 'Maiker';
        $tecnico3->apellido = 'Chacón';
        $tecnico3->cedula = '12345678';
        $tecnico3->foto = 'fotos/1732907237.jpeg';
        $tecnico3->cargo = 'Técnico de Planta';
        $tecnico3->save();

        $tecnico4 = new Tecnico;   
        $tecnico4->cod_mecanico = '12345';
        $tecnico4->nombre = 'Nelson';
        $tecnico4->apellido = 'Torres';
        $tecnico4->cedula = '12345678';
        $tecnico4->foto = 'fotos/1733163618.jpeg';
        $tecnico4->cargo = 'Técnico de Planta';
        $tecnico4->save();

        $tecnico5 = new Tecnico;   
        $tecnico5->cod_mecanico = '12345';
        $tecnico5->nombre = 'Arnaldo';
        $tecnico5->apellido = 'Bolivar';
        $tecnico5->cedula = '12345678';
        $tecnico5->foto = 'fotos/1734027331.jpeg';
        $tecnico5->cargo = 'Técnico de Planta';
        $tecnico5->save();
    }
}
