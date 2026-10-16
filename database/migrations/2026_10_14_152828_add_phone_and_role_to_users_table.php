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
    Schema::table('users', function (Blueprint $table) {
        // Numéro de téléphone (format +221XXXXXXXXX), facultatif
        $table->string('phone', 20)->nullable()->after('email');

        // Rôle : customer (client) ou admin
        $table->string('role', 20)->default('customer')->after('phone');

        $table->index('phone');
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropIndex(['phone']);
        $table->dropColumn(['phone', 'role']);
    });
}
};

