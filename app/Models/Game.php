<?php

namespace App\Models;

// PERHATIKAN BARIS INI: Ini yang memanggil "Roh" HasFactory dari sistem Laravel
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // Ini agar kita bisa mengisi kolom name, price, dll
    protected $guarded = ['id'];

    // Tambahkan function ini
public function category()
{
    return $this->belongsTo(Category::class);
}
}
