<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Usuario Admin
        |--------------------------------------------------------------------------
        */
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@tienda.com',
            'password' => Hash::make('ITCA123'),
            'role_id' => Role::where('name', 'admin')->first()->id
        ]);
        /*
        |--------------------------------------------------------------------------
        | Usuario Manager
        |--------------------------------------------------------------------------
        */
        User::create([
            'name' => 'Manager',
            'email' => 'manager@tienda.com',
            'password' => Hash::make('ITCA456'),
            'role_id' => Role::where('name', 'manager')->first()->id
        ]);
        /*
        |--------------------------------------------------------------------------
        | Usuario Analyst
        |--------------------------------------------------------------------------
        */
        User::create([
            'name' => 'Analista',
            'email' => 'analyst@tienda.com',
            'password' => Hash::make('ITCA789'),
            'role_id' => Role::where('name', 'analyst')->first()->id
        ]);
        /*
        |--------------------------------------------------------------------------
        | Usuario Customer
        |--------------------------------------------------------------------------
        */

        User::create([
            'name' => 'Cliente',
            'email' => 'customer@tienda.com',
            'password' => Hash::make('123'),
            'role_id' => Role::where('name', 'customer')->first()->id
        ]);
    }
}
