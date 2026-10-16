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
    Schema::create('cart_items', function (Blueprint $table) {
        $table->id();

        // Dans quel panier se trouve cet article
        $table->foreignId('cart_id')
              ->constrained('carts')
              ->cascadeOnDelete();

        // Quel produit
        $table->foreignId('product_id')
              ->constrained('products')
              ->cascadeOnDelete();

        // Quantité choisie (au moins 1, on le vérifiera dans le code)
        $table->unsignedSmallInteger('quantity')->default(1);

        $table->timestamps();

        // Un même produit ne peut apparaître qu'une seule fois par panier
        $table->unique(['cart_id', 'product_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
