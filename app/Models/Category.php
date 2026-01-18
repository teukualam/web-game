<?php

namespace App\Models;

// --- BARIS INI YANG TADINYA HILANG ---
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relasi: Satu Kategori punya banyak Game
    public function games()
    {
        return $this->hasMany(Game::class);
    }
}