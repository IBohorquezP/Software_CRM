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
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('admin123')
        ])->assignRole('Admin');

        User::create([
            'name'=>'User',
            'email'=>'user@user.com',
            'password'=>bcrypt('user123')
        ])->assignRole('Reader');
    }
}
