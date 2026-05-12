<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory_movements', function (Blueprint $table) {

            $table->id();

            // Producto relacionado
            $table->foreignId('product_id')
                ->constrained('products')
                ->onDelete('cascade');

            // Tipo de movimiento
            $table->enum('type', [
                'entry',
                'exit'
            ]);

            // Cantidad movimiento
            $table->integer('quantity');

            // Motivo
            $table->string('reason')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_movements');
    }
};
