<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    protected static function booted()
{
    // Menggunakan static::updated agar terpanggil saat status diubah di Admin
    static::updated(function ($transaction) {
        
        // LOGIKA DEBUGGING: Jika status diubah jadi Success
        if ($transaction->status === 'Success') {
            
            // Ambil nama game
            $gameName = $transaction->game ? $transaction->game->name : 'Game';

            // Paksa simpan pesan baru
            $message = new \App\Models\Message();
            $message->user_id = $transaction->user_id;
            $message->subject = 'Pembelian Berhasil: ' . $gameName;
            $message->content = "Halo pembeli, pembayaran untuk " . $gameName . " sudah kami terima. Kode game akan segera dikirim!";
            $message->is_read = false;
            $message->save(); // Simpan manual tanpa 'create'
        }
    });
}
}