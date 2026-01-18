<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - Level Tidak Ditemukan | Fazynsyy Store</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-50 dark:bg-gray-950 flex items-center justify-center min-h-screen p-6 font-sans">
    <div class="max-w-md w-full text-center">
        {{-- Animasi Ikon --}}
        <div class="relative inline-block mb-8">
            <img src="{{ asset('assets/Roket.png') }}" alt="Logo" class="h-32 w-auto animate-bounce mx-auto">
            <div class="absolute -top-4 -right-4 bg-red-500 text-white text-xs font-black px-3 py-1 rounded-full uppercase tracking-tighter">Error 404</div>
        </div>

        <h1 class="text-7xl font-black text-blue-600 dark:text-blue-500 italic tracking-tighter mb-2">404</h1>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white uppercase tracking-tighter mb-4 italic">Level Tidak Ditemukan!</h2>
        
        <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed mb-10">
            Sepertinya kamu tersesat di luar map. Halaman yang kamu cari mungkin sudah di-patch, dihapus, atau tidak pernah ada.
        </p>

        <div class="flex flex-col gap-4">
            <a href="{{ url('/') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-black py-4 px-8 rounded-2xl transition-all shadow-lg shadow-blue-500/30 uppercase italic tracking-wider flex items-center justify-center gap-3">
                <i class="fas fa-home"></i> Kembali ke Lobby
            </a>
            <a href="https://wa.me/6281390463237" class="text-blue-600 dark:text-blue-400 font-bold text-sm hover:underline italic">
                Laporkan Bug ke Admin?
            </a>
        </div>
    </div>
</body>
</html>