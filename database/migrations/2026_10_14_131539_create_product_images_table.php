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
    Schema::create('product_images', function (Blueprint $table) {
        $table->id();

        // À quel produit appartient la photo
        $table->foreignId('product_id')
              ->constrained('products')
              ->cascadeOnDelete();

        // Chemin du fichier dans le stockage : "products/robe-wax-1.jpg"
        // (on stocke le chemin, jamais l'image elle-même dans la base)
        $table->string('path');

        $table->string('alt_text')->nullable(); // description de l'image (accessibilité)
        $table->boolean('is_main')->default(false); // photo principale ?
        $table->unsignedInteger('sort_order')->default(0); // ordre d'affichage

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
