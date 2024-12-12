<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $role1 = Role::create(['name'=> 'Admin']);
        $role2 = Role::create(['name'=> 'Reader']);

        Permission::create(['name'=>'dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=> 'Clientes.create'])->assignRole($role1);
        Permission::create(['name'=> 'Clientes.edit'])->assignRole($role1);
        Permission::create(['name'=> 'Clientes.destroy'])->assignRole($role1);
        
        Permission::create(['name'=> 'Tecnicos.create'])->assignRole($role1);
        Permission::create(['name'=> 'Tecnicos.edit'])->assignRole($role1);
        Permission::create(['name'=> 'Tecnicos.destroy'])->assignRole($role1);
        Permission::create(['name'=> 'Tecnicos.asignarTecnicos'])->assignRole($role1);


        Permission::create(['name'=> 'Etapas.create'])->assignRole($role1);
        Permission::create(['name'=> 'Etapas.edit'])->assignRole($role1);
        Permission::create(['name'=> 'Etapas.destroy'])->assignRole($role1);
        
        Permission::create(['name'=> 'Bahias.create'])->assignRole($role1);
        Permission::create(['name'=> 'Bahias.edit'])->assignRole($role1);
        Permission::create(['name'=> 'Bahias.destroy'])->assignRole($role1);
        Permission::create(['name'=> 'Bahias.asignarBahias'])->assignRole($role1);
        Permission::create(['name'=> 'Bahias.editServicioBahias'])->assignRole($role1);

        Permission::create(['name'=> 'Repuestos.create'])->assignRole($role1);
        Permission::create(['name'=> 'Repuestos.edit'])->assignRole($role1);
        Permission::create(['name'=> 'Repuestos.destroy'])->assignRole($role1);

        Permission::create(['name'=> 'Servicios.create'])->assignRole($role1);
        Permission::create(['name'=> 'Servicios.edit'])->assignRole($role1);
        Permission::create(['name'=> 'Servicios.destroy'])->assignRole($role1);
    }
}
