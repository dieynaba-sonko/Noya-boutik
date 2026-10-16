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
    Schema::create('payments', function (Blueprint $table) {
        $table->id();

        // À quelle commande appartient ce paiement
        $table->foreignId('order_id')
              ->constrained('orders')
              ->restrictOnDelete();

        // Comment le client paie : cash_on_delivery, wave, orange_money, card
        $table->string('method')->default('cash_on_delivery');

        // État du paiement : pending, paid, failed, refunded
        $table->string('status')->default('pending');

        // Montant en FCFA, entier (copié du total de la commande)
        $table->unsignedInteger('amount');

        // Référence donnée par l'agrégateur (PayDunya, PayTech, CinetPay...)
        // Vide pour le paiement à la livraison
        $table->string('provider_reference')->nullable()->unique();

        // Date à laquelle l'argent a vraiment été reçu
        $table->timestamp('paid_at')->nullable();

        $table->timestamps();

        // Pour retrouver vite les paiements par statut
        $table->index('status');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
