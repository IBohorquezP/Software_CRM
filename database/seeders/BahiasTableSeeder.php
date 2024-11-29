<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bahia;

class BahiasTableSeeder extends Seeder
{

    public function run(): void
    {
        $bahia1 = new Bahia;
        $bahia1->nombre = 'Bombas y Turbos';
        $bahia1->foto = 'fotos/1732890819.jpeg';
        $bahia1->descripcion = 'Se trabajan las bombas y los turbos del motor';
        $bahia1->save();

        $bahia2 = new Bahia;
        $bahia2->nombre = 'Dinamometros';
        $bahia2->foto = 'fotos/1732810961.jpg';
        $bahia2->descripcion = 'Se hace la prueba de dinamometro al motor';
        $bahia2->save();

        $bahia3 = new Bahia;
        $bahia3->nombre = 'Camaras';
        $bahia3->foto = 'fotos/1732890837.jpeg';
        $bahia3->descripcion = 'Se trabajan las camaras del motor';
        $bahia3->save();
        
        $bahia4 = new Bahia;
        $bahia4->nombre = 'Cylinder Pack';
        $bahia4->foto = 'fotos/1732890859.jpeg';
        $bahia4->descripcion = 'Se trabajan los cilindros del motor';
        $bahia4->save();

        $bahia5 = new Bahia;
        $bahia5->nombre = 'Enfriadores';
        $bahia5->foto = 'fotos/1732890876.jpeg';
        $bahia5->descripcion = 'Se trabajan los enfriadores del motor';
        $bahia5->save();

        $bahia6 = new Bahia;
        $bahia6->nombre = 'Housing';
        $bahia6->foto = 'fotos/1732890901.jpeg';
        $bahia6->descripcion = 'Se hace el housing del motor';
        $bahia6->save();

        $bahia7 = new Bahia;
        $bahia7->nombre = 'Magnaflux';
        $bahia7->foto = 'fotos/1732890922.jpeg';
        $bahia7->descripcion = 'Se verifica que los componentes no tengan grietas o daños';
        $bahia7->save();

        $bahia8 = new Bahia;
        $bahia8->nombre = 'Shortblock';
        $bahia8->foto = 'fotos/1732890942.jpeg';
        $bahia8->descripcion = 'Se arma el bloque y el cigueñal del motor';
        $bahia8->save();

        $bahia9 = new Bahia;
        $bahia9->nombre = 'Tubos y Tornillos';
        $bahia9->foto = 'fotos/1732890964.jpeg';
        $bahia9->descripcion = 'Se trabajan los tubos y tornillos del motor';
        $bahia9->save();
    }
}
