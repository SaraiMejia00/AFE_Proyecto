<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // Pedido 1: Completado (1 Laptop Dell y 1 Teclado)
        $order1Id = DB::table('orders')->insertGetId([
            'total' => 1589.49, // 1499.99 + 89.50
            'status' => 'completed',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('order_items')->insert([
            ['order_id' => $order1Id, 'product_id' => 1, 'quantity' => 1, 'price' => 1499.99, 'created_at' => $now, 'updated_at' => $now],
            ['order_id' => $order1Id, 'product_id' => 4, 'quantity' => 1, 'price' => 89.50, 'created_at' => $now, 'updated_at' => $now],
        ]);

        // Pedido 2: Pendiente (1 Tarjeta Gráfica)
        $order2Id = DB::table('orders')->insertGetId([
            'total' => 599.99,
            'status' => 'pending',
            'created_at' => Carbon::now()->subDays(2),
            'updated_at' => Carbon::now()->subDays(2),
        ]);

        DB::table('order_items')->insert([
            ['order_id' => $order2Id, 'product_id' => 3, 'quantity' => 1, 'price' => 599.99, 'created_at' => Carbon::now()->subDays(2), 'updated_at' => Carbon::now()->subDays(2)],
        ]);
    }
}
