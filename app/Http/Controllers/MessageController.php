<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        // Mengambil pesan milik user yang sedang login, diurutkan dari yang terbaru
        $messages = Message::where('user_id', Auth::id())
                    ->latest()
                    ->get();

        return view('pesan.index', compact('messages'));
    }
}