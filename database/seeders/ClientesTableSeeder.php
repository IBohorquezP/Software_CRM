<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cliente1 = new Cliente;
        $cliente1->nombre = 'Insumeca';
        $cliente1->tipo = 'Productos y Servicios';
        $cliente1->foto = 'fotos/1732811143.png';
        $cliente1->save();

        $cliente2 = new Cliente;
        $cliente2->nombre = 'Caterpillar';
        $cliente2->tipo = 'Maquinaria';
        $cliente2->foto = 'fotos/1732811149.png';
        $cliente2->save();

        $cliente3 = new Cliente;
        $cliente3->nombre = 'CCV';
        $cliente3->tipo = 'Laboratorios';
        $cliente3->foto = 'fotos/1732811167.jpeg';
        $cliente3->save();

        $cliente4 = new Cliente;
        $cliente4->nombre = 'Chronus';
        $cliente4->tipo = 'Lubricantes';
        $cliente4->foto = 'fotos/1732811179.png';
        $cliente4->save();

        $cliente5 = new Cliente;
        $cliente5->nombre = 'Ferrominera';
        $cliente5->tipo = 'Minería';
        $cliente5->foto = 'fotos/1734115799.png';
        $cliente5->save();
    }
}
