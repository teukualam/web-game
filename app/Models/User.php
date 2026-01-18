<?php

namespace App\Models;

// --- TAMBAHAN PENTING ---
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
// ------------------------

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Tambahkan "implements FilamentUser" di sini
class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // --- FUNCTION INI YANG MEMBUKA PINTU ADMIN ---
    public function canAccessPanel(Panel $panel): bool
    {
        // Jika usertype adalah 'admin', return true (Boleh Masuk)
        // Selain itu return false (Ditolak / Refresh halaman)
       // return $this->usertype === 'admin';
       return true;
    }
}