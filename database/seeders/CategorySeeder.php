<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $categories = [
            [
                'name' => 'Computadoras Portátiles',
                'description' => 'Laptops de alto rendimiento para desarrollo, diseño y gaming.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Componentes PC',
                'description' => 'Tarjetas gráficas, procesadores, memoria RAM y almacenamiento sólido.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Periféricos',
                'description' => 'Teclados mecánicos, mouses ergonómicos, monitores y audífonos.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
