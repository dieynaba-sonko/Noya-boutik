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
    Schema::create('products', function (Blueprint $table) {
        $table->id();

        // À quelle catégorie appartient le produit
        $table->foreignId('category_id')
              ->constrained('categories')
              ->restrictOnDelete();

        $table->string('name');            // nom affiché : "Robe wax"
        $table->string('slug')->unique();  // pour l'URL : "robe-wax"
        $table->text('description')->nullable();

        // Prix en FCFA, entier positif (jamais de float)
        $table->unsignedInteger('price');

        // Quantité disponible en stock
        $table->unsignedInteger('stock_quantity')->default(0);

        $table->boolean('is_active')->default(true); // visible dans la boutique ?

        $table->softDeletes(); // ajoute la colonne deleted_at
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
