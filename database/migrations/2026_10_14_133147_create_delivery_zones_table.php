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
    Schema::create('delivery_zones', function (Blueprint $table) {
        $table->id();

        $table->string('name');            // nom de la zone : "Dakar centre"
        $table->text('description')->nullable(); // quartiers ou villes couverts

        // Frais de livraison en FCFA, entier positif (comme les prix)
        $table->unsignedInteger('fee');

        // Délai estimé, en jours (ex. 1 pour Dakar, 3 pour les régions)
        $table->unsignedTinyInteger('estimated_days')->default(1);

        $table->boolean('is_active')->default(true); // zone desservie ?
        $table->unsignedInteger('sort_order')->default(0); // ordre d'affichage

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_zones');
    }
};
