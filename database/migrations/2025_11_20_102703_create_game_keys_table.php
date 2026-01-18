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
    Schema::create('game_keys', function (Blueprint $table) {
        $table->id();
        $table->foreignId('game_id')->constrained()->cascadeOnDelete();
        $table->string('key_code'); // Kode lisensi (misal: XJH-112-PLO)
        $table->boolean('is_redeemed')->default(false); // Sudah terpakai belum?
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_keys');
    }
};
