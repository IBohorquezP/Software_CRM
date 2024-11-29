<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Cliente;
use app\Models\Etapa;
use app\Models\Tecnico;
use app\Models\Bahia;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Etapa::table('etapas')->insert([
            'nombre' => 'Desarme y Evaluación',
            'descripcion' => 'Se desarma y se evalua el motor',
            'foto' => 'password',
        ]);
    }
}
