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
    Schema::create('carts', function (Blueprint $table) {
        $table->id();

        // Identifiant de session du navigateur : relie le panier au visiteur
        // (unique : un seul panier par session)
        $table->string('session_id')->unique();

        // Client connecté (facultatif : on peut commander sans compte)
        $table->foreignId('user_id')
              ->nullable()
              ->constrained('users')
              ->nullOnDelete();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
