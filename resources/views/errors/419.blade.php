<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>419 - Sesi Expired | Fazynsyy Store</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-50 dark:bg-gray-950 flex items-center justify-center min-h-screen p-6 font-sans text-gray-900 dark:text-gray-100">
    <div class="max-w-md w-full text-center">
        {{-- Ikon Jam untuk Sesi Expired --}}
        <div class="mb-8 flex justify-center">
            <div class="w-32 h-32 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 animate-pulse border-4 border-blue-500/20">
                <i class="fas fa-clock text-5xl"></i>
            </div>
        </div>

        <h1 class="text-6xl font-black text-gray-900 dark:text-white italic tracking-tighter mb-2 uppercase">Sesi <span class="text-blue-600">AFK</span></h1>
        <h2 class="text-xl font-bold text-gray-500 dark:text-gray-400 uppercase tracking-tighter mb-8 italic">Keamanan Terdeteksi!</h2>
        
        <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed mb-10 px-4">
            Maaf, sesi kamu telah berakhir karena terlalu lama tidak ada aktivitas. Silakan refresh halaman untuk melanjutkan transaksi.
        </p>

        <div class="flex flex-col gap-4">
            <button onclick="window.location.reload()" class="bg-blue-600 hover:bg-blue-700 text-white font-black py-4 px-8 rounded-2xl transition-all shadow-lg shadow-blue-500/30 uppercase italic tracking-wider flex items-center justify-center gap-3">
                <i class="fas fa-sync-alt"></i> Refresh Sekarang
            </button>
            <a href="{{ url('/') }}" class="text-gray-500 hover:text-blue-600 dark:hover:text-blue-400 font-bold text-sm transition-colors uppercase italic">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>