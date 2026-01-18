<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\Banner;       // Model Banner
use App\Models\BankAccount;  // Model BankAccount (Penting!)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    // 1. Halaman Depan (List Game + Banner Slider)
    public function index()
    {
        $games = Game::all();
        
        // Ambil banner yang aktif saja
        $banners = Banner::where('is_active', true)->latest()->get(); 

        return view('dashboard', compact('games', 'banners'));
    }

    // 2. Halaman Detail Game
    public function show(Game $game)
    {   
        // Pastikan relasi category dimuat agar tidak error saat dipanggil di blade
        $game->load('category');
        return view('shop.show', compact('game'));
    }

    // 3. Halaman Checkout (Form Pembayaran + Data Bank Dinamis)
    public function checkout(Game $game)
    {
        // Ambil data bank aktif dari database untuk ditampilkan di Pop-up
        $banks = BankAccount::where('is_active', true)->get();

        return view('shop.checkout', compact('game', 'banks'));
    }

    // Halaman List Kategori
    public function categories()
    {
        $categories = Category::withCount('games')->get();
        return view('shop.categories', compact('categories'));
    }

    // Filter Game berdasarkan Kategori
    public function gamesByCategory(Category $category)
    {
        // Ambil game sesuai kategori
        $games = $category->games; 
        
        // Kita perlu ambil banner juga karena view 'dashboard' membutuhkannya
        $banners = Banner::where('is_active', true)->latest()->get();

        return view('dashboard', compact('games', 'banners')); 
    }

    // Halaman Flash Sale
    public function flashSale()
    {
        // Ambil 4 game secara acak untuk simulasi flash sale
        $games = Game::inRandomOrder()->limit(4)->get();
        return view('shop.flash-sale', compact('games'));
    }

    // 4. Proses Simpan Transaksi (Upload Bukti)
    public function store(Request $request, Game $game)
    {
        $request->validate([
            'payment_method' => 'required|string',
            'payment_proof' => 'required|image|max:2048', // Wajib gambar, max 2MB
        ]);

        // Upload Gambar Bukti
        $proofPath = $request->file('payment_proof')->store('payment_proofs', 'public');

        Transaction::create([
            'user_id' => Auth::id(),
            'game_id' => $game->id,
            'total_price' => $game->price,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'payment_proof' => $proofPath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil! Admin akan memverifikasi pembayaranmu.');
    }
}