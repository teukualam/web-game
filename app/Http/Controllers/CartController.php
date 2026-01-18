<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Tampilkan isi keranjang
    public function index()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->with('game')->get();
        return view('shop.cart', compact('cartItems'));
    }

    // Tambah ke keranjang
    public function store(Game $game)
    {
        // Cek apakah sudah ada di keranjang?
        $exists = CartItem::where('user_id', Auth::id())
            ->where('game_id', $game->id)
            ->exists();

        if (!$exists) {
            CartItem::create([
                'user_id' => Auth::id(),
                'game_id' => $game->id,
            ]);
            return back()->with('success', 'Berhasil masuk keranjang!');
        }

        return back()->with('success', 'Game ini sudah ada di keranjangmu.');
    }

    // Hapus dari keranjang
    public function destroy(CartItem $cartItem)
    {
        if ($cartItem->user_id == Auth::id()) {
            $cartItem->delete();
        }
        return back()->with('success', 'Item dihapus dari keranjang.');
    }
}