<?php

namespace App\Observers;

use App\Models\Transaction;
use App\Models\Message;
use Illuminate\Support\Facades\Log;

class TransactionObserver
{
    /**
     * Menangani event setelah data disimpan (create atau update).
     */
    public function saved(Transaction $transaction)
    {
        // Debugging: Cek di storage/logs/laravel.log jika pesan tidak muncul
        Log::info("Observer Terpanggil untuk Transaksi ID: {$transaction->id}, Status: {$transaction->status}");

        // Pastikan statusnya 'Success' (Sesuaikan huruf besar/kecilnya dengan di database)
        if ($transaction->status === 'Success') {
            
            // Ambil nama game dari relasi atau kolom game_name
            $namaGame = $transaction->game ? $transaction->game->name : ($transaction->game_name ?? 'Game');

            // Cek apakah pesan untuk transaksi ini sudah pernah dibuat (mencegah duplikat)
            $exists = Message::where('user_id', $transaction->user_id)
                             ->where('subject', 'LIKE', "%{$namaGame}%")
                             ->exists();

            if (!$exists) {
                Message::create([
                    'user_id' => $transaction->user_id,
                    'subject' => 'Pembelian Berhasil: ' . $namaGame,
                    'content' => "Halo " . ($transaction->user->name ?? 'User') . ",\n\nPembayaran Anda untuk " . $namaGame . " telah berhasil diverifikasi. Pesanan Anda sedang diproses.\n\nTerima kasih!",
                    'is_read' => false,
                ]);
                Log::info("Pesan otomatis berhasil dibuat untuk User ID: {$transaction->user_id}");
            }
        }
    }
}