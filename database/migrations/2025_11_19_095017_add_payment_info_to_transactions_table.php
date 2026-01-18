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
    Schema::table('transactions', function (Blueprint $table) {
        $table->string('payment_method')->nullable()->after('total_price'); // Contoh: BCA, DANA
        $table->string('payment_proof')->nullable()->after('payment_method'); // Path foto bukti
    });
}

public function down(): void
{
    Schema::table('transactions', function (Blueprint $table) {
        $table->dropColumn(['payment_method', 'payment_proof']);
    });
}
};
