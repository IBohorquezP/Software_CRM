<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'name'=>'Oscar',
            'email'=>'oscar@gmail.com',
            'password'=>bcrypt('123456789')
        ])->assignRole('Admin');

        User::create([
            'name'=>'Ismael',
            'email'=>'pradoismael50@gmail.com',
            'password'=>bcrypt('2459poropopo')
        ])->assignRole('Reader');
    }
}
