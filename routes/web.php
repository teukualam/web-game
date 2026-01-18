<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Redirect Filament/Admin Login ke Login Standar
Route::get('/admin/login', function () {
    return redirect()->route('login');
})->name('filament.admin.auth.login');

// 2. Landing Page (Halaman Awal sebelum Login)
Route::get('/', function () {
    return view('welcome');
});

// 3. AREA CLIENT / PEMBELI (Harus Login)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard & Katalog (Menggunakan ShopController agar $games terdefinisi)
    Route::get('/dashboard', [ShopController::class, 'index'])->name('dashboard');
    Route::get('/game/{game}', [ShopController::class, 'show'])->name('game.show');

    // Checkout & Transaksi
    Route::get('/checkout/{game}', [ShopController::class, 'checkout'])->name('game.checkout');
    Route::post('/checkout/{game}', [ShopController::class, 'store'])->name('game.store');

    // FITUR PESAN (Tempat User Melihat CD-Key/Akun)
    Route::get('/pesan', [MessageController::class, 'index'])->name('pesan.index');

    // Keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{game}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');

    // Kategori & Promo
    Route::get('/categories', [ShopController::class, 'categories'])->name('categories.index');
    Route::get('/category/{category:slug}', [ShopController::class, 'gamesByCategory'])->name('category.games');
    Route::get('/flash-sale', [ShopController::class, 'flashSale'])->name('flash-sale');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/terms', function () { return view('terms'); })->name('terms');
    Route::get('/privacy', function () { return view('privacy'); })->name('privacy');
});

require __DIR__.'/auth.php';