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
    Schema::create('order_items', function (Blueprint $table) {
        $table->id();

        // À quelle commande appartient cette ligne
        $table->foreignId('order_id')
              ->constrained('orders')
              ->cascadeOnDelete();

        // Produit acheté (facultatif : on garde la ligne même si le produit disparaît)
        $table->foreignId('product_id')
              ->nullable()
              ->constrained('products')
              ->nullOnDelete();

        // Copies faites au moment de la commande
        $table->string('product_name');                  // nom du produit ce jour-là
        $table->unsignedInteger('unit_price');           // prix unitaire en FCFA ce jour-là

        $table->unsignedSmallInteger('quantity');        // quantité commandée
        $table->unsignedInteger('line_total');           // unit_price x quantity

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
