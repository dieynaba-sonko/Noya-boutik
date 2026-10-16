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
    Schema::create('orders', function (Blueprint $table) {
        $table->id();

        // Référence visible par le client, non devinable : "NB-2026-8F3K2A"
        $table->string('reference')->unique();

        // Client connecté (facultatif : on peut commander sans compte)
        $table->foreignId('user_id')
              ->nullable()
              ->constrained('users')
              ->nullOnDelete();

        // Zone de livraison choisie
        $table->foreignId('delivery_zone_id')
              ->constrained('delivery_zones')
              ->restrictOnDelete();

        // Statut de la commande
        $table->string('status')->default('pending');

        // Coordonnées copiées dans la commande (pas de compte obligatoire)
        $table->string('customer_name');
        $table->string('customer_phone');    // format +221XXXXXXXXX
        $table->string('delivery_address');
        $table->text('notes')->nullable();   // indications du client

        // Montants en FCFA, entiers, copiés au moment de la commande
        $table->unsignedInteger('subtotal');       // total des articles
        $table->unsignedInteger('delivery_fee');   // frais de livraison
        $table->unsignedInteger('total');          // subtotal + delivery_fee

        // Suivi de la confirmation par téléphone
        $table->timestamp('confirmed_at')->nullable();

        $table->timestamps();

        // Pour retrouver vite les commandes par statut ou par téléphone
        $table->index('status');
        $table->index('customer_phone');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
