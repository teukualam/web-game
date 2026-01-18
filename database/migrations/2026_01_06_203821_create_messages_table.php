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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke user yang menerima pesan
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Subjek pesan (contoh: Pesanan Cyberpunk 2077)
            $table->string('subject');
            
            // Isi pesan (Isi detail akun: Email, Password, atau Key game)
            $table->text('content');
            
            // Status pesan (biar user tahu mana pesan baru)
            $table->boolean('is_read')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};