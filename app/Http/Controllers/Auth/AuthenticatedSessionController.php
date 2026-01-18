<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses login dan pengalihan user.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();

    $request->session()->regenerate();

    $user = Auth::user();

    // Logika Pengalihan Berdasarkan Role
    if ($user->usertype === 'admin') {
        // Jika Admin, paksa masuk ke Dashboard Filament (Laporan Keuangan)
        return redirect('/admin');
    }

    // Jika User Biasa, masuk ke Dashboard Marketplace
    return redirect()->intended(route('dashboard', absolute: false));
}

    /**
     * Proses Logout.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}