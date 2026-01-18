<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class GameSentNotification extends Notification
{
    use Queueable;

    public $data;

    /**
     * Kirim data berupa array yang berisi game_name, message, dan game_key
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Kita simpan ke database agar bisa dipanggil di view
     */
    public function via(object $notifiable): array
    {
        return ['database']; // Ubah dari 'mail' ke 'database'
    }

    /**
     * Struktur data yang akan disimpan di kolom 'data' pada tabel notifications
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'game_name' => $this->data['game_name'],
            'message'   => $this->data['message'],
            'game_key'  => $this->data['game_key'],
        ];
    }

    /**
     * (Opsional) Jika ingin tetap bisa dipanggil sebagai array biasa
     */
    public function toArray(object $notifiable): array
    {
        return [
            'game_name' => $this->data['game_name'],
            'message'   => $this->data['message'],
            'game_key'  => $this->data['game_key'],
        ];
    }
}