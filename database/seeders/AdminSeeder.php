<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@game.com'], // Kunci pencarian (agar tidak duplikat)
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'), // Ganti password sesuai keinginan
                'usertype' => 'admin', // PENTING: Ini kunci akses Filament
                'email_verified_at' => now(),
            ]
        );
    }
}