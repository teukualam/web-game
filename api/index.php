<?php

// Jalankan pembersihan cache saat pertama kali diakses di server Vercel
exec('php ../artisan config:cache');
exec('php ../artisan view:cache');

require __DIR__ . '/../public/index.php';