<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $products = [
            // Categoría 1: Laptops
            [
                'category_id' => 1,
                'name' => 'Laptop Dell XPS 15',
                'slug' => 'laptop-dell-xps-15',
                'description' => 'Procesador Intel Core i7, 16GB RAM, 512GB SSD. Ideal para UI/UX Development.',
                'price' => 1499.99,
                'stock' => 12,
                'image' => 'product_images/dell-xps-15.jpg',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category_id' => 1,
                'name' => 'MacBook Pro 14" M2',
                'slug' => 'macbook-pro-14-m2',
                'description' => 'Chip M2 Pro de Apple, 16GB RAM, 1TB SSD. Pantalla Liquid Retina XDR.',
                'price' => 1999.00,
                'stock' => 8,
                'image' => 'product_images/1779058221_Laptop-Hp-240-G7-I3-4gb1t-1',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            // Categoría 2: Componentes
            [
                'category_id' => 2,
                'name' => 'NVIDIA GeForce RTX 4070',
                'slug' => 'nvidia-geforce-rtx-4070',
                'description' => 'Tarjeta gráfica de última generación para renderizado y gaming en 4K.',
                'price' => 599.99,
                'stock' => 5,
                'image' => 'product_images/rtx-4070.jpg',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            // Categoría 3: Periféricos
            [
                'category_id' => 3,
                'name' => 'Teclado Mecánico Keychron K2',
                'slug' => 'teclado-mecanico-keychron-k2',
                'description' => 'Teclado inalámbrico con switches Gateron Brown. Formato 75%.',
                'price' => 89.50,
                'stock' => 20,
                'image' => 'product_images/teclado-keychron-k2.jpg',
                'status' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ];

        DB::table('products')->insert($products);
    }
}