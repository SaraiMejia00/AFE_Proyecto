<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Roles sistema
        |--------------------------------------------------------------------------
        */
        Role::create([
            'name' => 'admin',
            'description' => 'Administrador del sistema'
        ]);

        Role::create([
            'name' => 'manager',
            'description' => 'Gestor operativo'
        ]);

        Role::create([
            'name' => 'analyst',
            'description' => 'Analista del sistema'
        ]);

        Role::create([
            'name' => 'customer',
            'description' => 'Cliente de tienda'
        ]);
    }
}
