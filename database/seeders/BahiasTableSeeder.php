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
        $bahia2->nombre = 'Dinamometro';
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

        $bahia10 = new Bahia;
        $bahia10->nombre = 'Bombas y Turbos (Desarme)';
        $bahia10->foto = 'fotos/1733760017.jpeg';
        $bahia10->descripcion = 'Se trabaja las bombas y los turbos en desarme';
        $bahia10->save();

        $bahia11 = new Bahia;
        $bahia11->nombre = 'Cylinder Pack (Desarme)';
        $bahia11->foto = 'fotos/1733760055.jpeg';
        $bahia11->descripcion = 'Se trabajan los cilindros en desarme';
        $bahia11->save();

        $bahia12 = new Bahia;
        $bahia12->nombre = 'Camaras (Desarme)';
        $bahia12->foto = 'fotos/1733760108.jpeg';
        $bahia12->descripcion = 'Se trabajan las camaras en desarme';
        $bahia12->save();

        $bahia13 = new Bahia;
        $bahia13->nombre = 'Lavado Externo (Desarme)';
        $bahia13->foto = 'fotos/1733760154.jpeg';
        $bahia13->descripcion = 'Se hace el lavado del motor externamente';
        $bahia13->save();

        $bahia14 = new Bahia;
        $bahia14->nombre = 'Lavado Interno (Desarme)';
        $bahia14->foto = 'fotos/1733760201.jpeg';
        $bahia14->descripcion = 'Se lava internamente el motor';
        $bahia14->save();

        $bahia15 = new Bahia;
        $bahia15->nombre = 'Despaquetizado';
        $bahia15->foto = 'fotos/1733760238.jpeg';
        $bahia15->descripcion = 'Se hace el despaquetizado del motor';
        $bahia15->save();

        $bahia16 = new Bahia;
        $bahia16->nombre = 'Embragues';
        $bahia16->foto = 'fotos/1733760260.jpeg';
        $bahia16->descripcion = 'Se trabajan los embragues del motor';
        $bahia16->save();

        $bahia17 = new Bahia;
        $bahia17->nombre = 'Cuarto de Pinturas';
        $bahia17->foto = 'fotos/1733760310.jpeg';
        $bahia17->descripcion = 'Se pinta el motor';
        $bahia17->save();

        $bahia18 = new Bahia;
        $bahia18->nombre = 'Transito Entrante';
        $bahia18->foto = 'fotos/1733760359.jpeg';
        $bahia18->descripcion = 'Entrada de los servicios';
        $bahia18->save();

        $bahia19 = new Bahia;
        $bahia19->nombre = 'Transito Saliente';
        $bahia19->foto = 'fotos/1733760379.jpeg';
        $bahia19->descripcion = 'Servicios saliendos';
        $bahia19->save();
    }
}
