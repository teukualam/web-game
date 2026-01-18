<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message; 
use App\Notifications\GameSentNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index()
    {
        // Mengambil semua user untuk ditampilkan di dropdown admin
        $users = User::all();
        return view('dashboard', compact('users'));
    }

    public function sendMessage(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'game_name' => 'required|string|max:255',
            'message' => 'required|string',
            'game_key' => 'required|string',
        ]);

        // 2. Cari User-nya
        $user = User::find($request->user_id);

        // 3. SIMPAN KE TABEL MESSAGES
        // Pastikan kolom 'subject' dan 'content' ada di migration tabel messages Anda
        Message::create([
            'user_id' => $user->id,
            'subject' => 'Pengiriman Game: ' . $request->game_name,
            'content' => "Halo " . $user->name . ",\n\n" . $request->message . "\n\nDetail Akun/Key: " . $request->game_key,
            'is_read' => false,
        ]);

        // 4. Kirim Notifikasi (Opsional, untuk alert sistem)
        $details = [
            'game_name' => $request->game_name,
            'message'   => $request->message,
            'game_key'  => $request->game_key,
        ];
        $user->notify(new GameSentNotification($details));

        return redirect()->back()->with('success', 'Pesan game berhasil dikirim ke ' . $user->name);
    }
}