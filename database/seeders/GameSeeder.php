<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Bersihkan data lama (Versi PostgreSQL)
        // PostgreSQL tidak mengenal FOREIGN_KEY_CHECKS=0. 
        // Kita gunakan delete() agar lebih aman lintas database.
        DB::table('games')->delete();
        DB::table('categories')->delete();

        // 2. Buat Kategori
        $categoryId = DB::table('categories')->insertGetId([
            'name' => 'Kategori Pilihan',
            'slug' => 'kategori-pilihan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Masukkan data game (Total 11 Game)
        $games = [
            [
                'name' => 'Elden Ring',
                'price' => 599000,
                'description' => 'Elden Ring Game.',
                'cover_image' => 'assets/Elden Ring.png',
                'category_id' => $categoryId,
            ],
            [
                'name' => 'Cyberpunk 2077',
                'price' => 700000,
                'description' => 'Cyberpunk 2077 Game.',
                'cover_image' => 'assets/cyberpunk.png',
                'category_id' => $categoryId,
            ],
            [
                'name' => 'GTA V',
                'price' => 300000,
                'description' => 'GTA V Game.',
                'cover_image' => 'assets/gta.png',
                'category_id' => $categoryId,
            ],
            [
                'name' => 'Forza Horizon 5',
                'price' => 600000,
                'description' => 'Forza Game.',
                'cover_image' => 'assets/Forza Horizon 5.png',
                'category_id' => $categoryId,
            ],
            [
                'name' => 'Red Dead Redemption 2',
                'price' => 640000,
                'description' => 'RDR 2 Game.',
                'cover_image' => 'assets/rdr2.png',
                'category_id' => $categoryId,
            ],
            [
                'name' => 'Call of Duty: Modern Warfare II',
                'price' => 950000,
                'description' => 'Call of Duty: Modern Warfare II Game.',
                'cover_image' => 'assets/warzone.png',
                'category_id' => $categoryId,
            ],
            [
                'name' => 'The Last of Us Part II Remastered',
                'price' => 729000,
                'description' => 'The Last of Us Part II Remastered Game.',
                'cover_image' => 'assets/tlou2.png',
                'category_id' => $categoryId,
            ],
            [
                'name' => 'The Last of Us Part I',
                'price' => 879000,
                'description' => 'The Last of Us Part I Game.',
                'cover_image' => 'assets/tlou1.png',
                'category_id' => $categoryId,
            ],
            [
                'name' => "Assassin's Creed Origins",
                'price' => 619000,
                'description' => "Assassin's Creed Origins Game.",
                'cover_image' => 'assets/ac-origins.png',
                'category_id' => $categoryId,
            ],
            [
                'name' => "Assassin's Creed Odyssey",
                'price' => 619000,
                'description' => "Assassin's Creed Odyssey Game.",
                'cover_image' => 'assets/ac-odyssey.png',
                'category_id' => $categoryId,
            ],
            [
                'name' => "Assassin's Creed Valhalla",
                'price' => 619000,
                'description' => "Assassin's Creed Valhalla Game.",
                'cover_image' => 'assets/ac-valhalla.png',
                'category_id' => $categoryId,
            ],
        ];

        foreach ($games as $game) {
            DB::table('games')->insert(array_merge($game, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}