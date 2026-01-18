<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Game Store') }} - The Next Gen Gaming Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Modern Reset & Base */
        body { 
            background-color: #030303; 
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #e5e5e5;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }

        /* Abstract Backgrounds - Ubah ke Biru/Cyan */
        .bg-spotlight {
            background: radial-gradient(circle at 50% 0%, rgba(14, 165, 233, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 80% 10%, rgba(30, 64, 175, 0.1) 0%, transparent 40%);
        }

        .bg-noise {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.05'/%3E%3C/svg%3E");
            opacity: 0.4;
        }

        /* Utilities - Glow Biru */
        .text-glow {
            text-shadow: 0 0 40px rgba(14, 165, 233, 0.5);
        }
        
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .glass-nav {
            background: rgba(3, 3, 3, 0.7);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Animations */
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-scroll {
            animation: scroll 30s linear infinite;
        }

        .hover-glow:hover {
            box-shadow: 0 0 30px rgba(14, 165, 233, 0.3);
            border-color: rgba(14, 165, 233, 0.5);
        }

        @keyframes shimmer {
            100% { transform: translateX(100%); }
        }
    </style>
</head>
<body class="antialiased selection:bg-sky-500 selection:text-white overflow-x-hidden">

    <nav x-data="{ scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         :class="scrolled ? 'glass-nav py-4' : 'bg-transparent py-6'"
         class="fixed w-full z-50 transition-all duration-300 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <a href="/" class="flex items-center gap-3 group">
                    <div class="relative w-10 h-10 flex items-center justify-center">
                        <div class="absolute inset-0 bg-sky-600 rounded-xl rotate-6 opacity-50 group-hover:rotate-12 transition duration-300"></div>
                        <div class="absolute inset-0 bg-gray-900 rounded-xl border border-white/10 flex items-center justify-center relative z-10">
                            <span class="font-black text-sky-500 text-xl">G</span>
                        </div>
                    </div>
                    <span class="font-bold text-xl tracking-tight text-white">Game<span class="text-sky-500">Store</span>.</span>
                </a>

                <div class="hidden md:flex items-center bg-white/5 rounded-full px-6 py-2 border border-white/5 backdrop-blur-sm">
                    <a href="#games" class="text-sm font-medium text-gray-400 hover:text-white px-4 py-1 transition">Games</a>
                    <a href="#features" class="text-sm font-medium text-gray-400 hover:text-white px-4 py-1 transition">Fitur</a>
                    <a href="#faq" class="text-sm font-medium text-gray-400 hover:text-white px-4 py-1 transition">Bantuan</a>
                </div>

                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-bold text-white hover:text-sky-400 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="hidden md:block text-sm font-medium text-gray-400 hover:text-white transition">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-white text-black px-5 py-2 rounded-lg font-bold text-sm hover:bg-sky-500 hover:text-white transition duration-300">
                                    Daftar
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="relative min-h-screen flex flex-col justify-center pt-20 overflow-hidden bg-spotlight">
        <div class="absolute inset-0 bg-noise z-0 pointer-events-none"></div>
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-sky-600/20 rounded-full blur-[100px] opacity-50 animate-pulse"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-sky-500/20 bg-sky-900/10 text-sky-400 text-xs font-bold tracking-wide uppercase mb-8 backdrop-blur-sm hover:bg-sky-900/20 transition cursor-default">
                <span class="relative flex h-2 w-2">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2 w-2 bg-sky-500"></span>
                </span>
                fazynsyy
            </div>

            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black tracking-tight text-white mb-6 leading-none">
                BELI GAME <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-blue-500 to-indigo-600 text-glow">
                    MURAH & TERPERCAYA
                </span>
            </h1>

            <p class="text-lg md:text-xl text-gray-400 mb-10 max-w-2xl mx-auto leading-relaxed font-light">
                Platform game dengan harga termurah. Proses cepat, 100% legal.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center w-full">
                <a href="#games" class="group relative px-8 py-4 bg-sky-600 rounded-xl font-bold text-white overflow-hidden shadow-lg shadow-sky-600/25 transition-all hover:scale-105 active:scale-95">
                    <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>
                    <span class="relative flex items-center gap-2">
                        Mulai Belanja
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </span>
                </a>
                <a href="{{ route('register') }}" class="px-8 py-4 rounded-xl font-bold text-gray-300 hover:text-white border border-white/10 hover:border-white/30 hover:bg-white/5 transition-all">
                    Buat Akun Baru
                </a>
            </div>

            <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto border-t border-white/5 pt-8">
                <div>
                    <div class="text-3xl font-black text-white mb-1">24/7</div>
                    <div class="text-xs text-gray-500 uppercase tracking-widest">Layanan Otomatis</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-white mb-1">10K+</div>
                    <div class="text-xs text-gray-500 uppercase tracking-widest">Transaksi Sukses</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-white mb-1">5 Menit</div>
                    <div class="text-xs text-gray-500 uppercase tracking-widest">Kecepatan Kirim</div>
                </div>
                <div>
                    <div class="text-3xl font-black text-white mb-1">4.9</div>
                    <div class="text-xs text-gray-500 uppercase tracking-widest">Rating Pelanggan</div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12 border-y border-white/5 bg-black/40 overflow-hidden relative">
        <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-[#030303] to-transparent z-10"></div>
        <div class="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-[#030303] to-transparent z-10"></div>
        
        <div class="flex overflow-hidden group">
            <div class="animate-scroll whitespace-nowrap flex gap-16 items-center px-8 opacity-50 hover:opacity-100 transition duration-500 grayscale hover:grayscale-0">
                <span class="text-2xl font-black text-white">ELDEN RING</span>
                <span class="text-2xl font-black text-white">CYBERPUNK 2077</span>
                <span class="text-2xl font-black text-white">GRAND THIEF AUTO V</span>
                <span class="text-2xl font-black text-white">ARC RAIDERS</span>
                <span class="text-2xl font-black text-white">RED DEAD REDEMPTION 2</span>
                <span class="text-2xl font-black text-white">HOGWART LEGACY</span>
                <span class="text-2xl font-black text-white">BLACK MYTH: WUKONG</span>
                <span class="text-2xl font-black text-white">COUNTER-STRIKE 2</span>
                <span class="text-2xl font-black text-white">EA SPORTS FC 25</span>
            </div>
        </div>
    </div>

    <section id="games" class="py-32 relative bg-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div>
                    <h2 class="text-4xl md:text-5xl font-black text-white mb-4">Trending Games</h2>
                    <p class="text-gray-400 max-w-lg">Game paling populer minggu ini. Dapatkan voucher dan item eksklusif dengan harga promo.</p>
                </div>
                
                <a href="{{ route('login') }}" class="group flex items-center gap-2 text-white font-bold border-b border-sky-500 pb-1 hover:text-sky-500 transition">
                    Lihat Semua Katalog
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 group-hover:translate-x-1 transition">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="group relative rounded-2xl bg-[#0a0a0a] border border-white/10 overflow-hidden hover:border-sky-500/50 transition-all duration-300">
                    <div class="aspect-[3/4] relative overflow-hidden">
                        <img src="{{ asset('assets/cyberpunk.png') }}" class="object-cover w-full h-full group-hover:scale-110 transition duration-700" alt="Cyberpunk 2077">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-transparent to-transparent opacity-90"></div>
                        <div class="absolute top-3 right-3">
                            <span class="bg-sky-500 text-white text-[10px] font-bold px-2 py-1 rounded shadow-lg">HOT</span>
                        </div>
                    </div>
                    <div class="absolute bottom-0 inset-x-0 p-5">
                        <h3 class="text-xl font-bold text-white mb-1 group-hover:text-sky-400 transition">Cyberpunk 2077</h3>
                        <p class="text-sm text-gray-500 mb-4">RPG, Open World</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="block text-xs text-gray-400 line-through">Rp 500.000</span>
                                <span class="block text-lg font-bold text-white">Rp 250.000</span>
                            </div>
                            <a href="{{ route('login') }}" class="bg-white text-black p-2.5 rounded-lg hover:bg-sky-500 hover:text-white transition transform hover:rotate-12 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="group relative rounded-2xl bg-[#0a0a0a] border border-white/10 overflow-hidden hover:border-blue-500/50 transition-all duration-300">
                    <div class="aspect-[3/4] relative overflow-hidden">
                        <img src="{{ asset('assets/rdr2.png') }}" class="object-cover w-full h-full group-hover:scale-110 transition duration-700" alt="RDR 2">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-transparent to-transparent opacity-90"></div>
                    </div>
                    <div class="absolute bottom-0 inset-x-0 p-5">
                        <h3 class="text-xl font-bold text-white mb-1 group-hover:text-sky-500 transition">Red Dead Redemption 2</h3>
                        <p class="text-sm text-gray-500 mb-4">Action, Open World</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="block text-lg font-bold text-white">Rp 750.000</span>
                            </div>
                            <a href="{{ route('login') }}" class="bg-white text-black p-2.5 rounded-lg hover:bg-sky-600 hover:text-white transition transform hover:rotate-12 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="group relative rounded-2xl bg-[#0a0a0a] border border-white/10 overflow-hidden hover:border-sky-500/50 transition-all duration-300">
                    <div class="aspect-[3/4] relative overflow-hidden">
                        <img src="{{ asset('assets/Elden Ring.png') }}" class="object-cover w-full h-full group-hover:scale-110 transition duration-700" alt="Elden Ring">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-transparent to-transparent opacity-90"></div>
                    </div>
                    <div class="absolute bottom-0 inset-x-0 p-5">
                        <h3 class="text-xl font-bold text-white mb-1 group-hover:text-sky-500 transition">Elden Ring</h3>
                        <p class="text-sm text-gray-500 mb-4">Souls-like, Fantasy</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="block text-lg font-bold text-white">Rp 590.000</span>
                            </div>
                            <a href="{{ route('login') }}" class="bg-white text-black p-2.5 rounded-lg hover:bg-sky-600 hover:text-white transition transform hover:rotate-12 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="group relative rounded-2xl bg-[#0a0a0a] border border-white/10 overflow-hidden hover:border-sky-500/50 transition-all duration-300">
                    <div class="aspect-[3/4] relative overflow-hidden">
                        <img src="{{ asset('assets/battlefield6.png') }}" class="object-cover w-full h-full group-hover:scale-110 transition duration-700" alt="Battlefield 6">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-transparent to-transparent opacity-90"></div>
                    </div>
                    <div class="absolute bottom-0 inset-x-0 p-5">
                        <h3 class="text-xl font-bold text-white mb-1 group-hover:text-sky-400 transition">Battlefield 6</h3>
                        <p class="text-sm text-gray-500 mb-4">FPS, Multiplayer</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="block text-lg font-bold text-white">Rp 559.300</span>
                            </div>
                            <a href="{{ route('login') }}" class="bg-white text-black p-2.5 rounded-lg hover:bg-sky-500 hover:text-white transition transform hover:rotate-12 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="py-24 bg-[#050505] border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-sky-500 font-bold tracking-wider uppercase text-sm">Why Choose Us</span>
                <h2 class="text-3xl md:text-5xl font-black text-white mt-2">Platform Fitur Lengkap</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2 glass-panel p-8 md:p-12 rounded-3xl relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-sky-600/10 rounded-full blur-[80px] group-hover:bg-sky-600/20 transition duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-sky-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-sky-500/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" /></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Pengiriman Instan Otomatis</h3>
                        <p class="text-gray-400 text-lg leading-relaxed max-w-lg">
                            Sistem kami bekerja 24 jam nonstop. Setelah pembayaran terkonfirmasi, kode voucher atau top-up akan masuk ke akunmu dalam hitungan detik tanpa antri.
                        </p>
                    </div>
                </div>

                <div class="glass-panel p-8 rounded-3xl relative overflow-hidden group hover:border-sky-500/30 transition">
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-sky-600/10 rounded-full blur-[60px]"></div>
                    <div class="w-12 h-12 bg-sky-500/10 rounded-xl flex items-center justify-center mb-6 text-sky-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" /></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Legal & Aman</h3>
                    <p class="text-gray-400 text-sm">Transaksi resmi, akun dijamin aman dari banned.</p>
                </div>

                <div class="glass-panel p-8 rounded-3xl relative overflow-hidden group hover:border-indigo-500/30 transition">
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-indigo-600/10 rounded-full blur-[60px]"></div>
                    <div class="w-12 h-12 bg-indigo-500/10 rounded-xl flex items-center justify-center mb-6 text-indigo-500">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Harga Termurah</h3>
                    <p class="text-gray-400 text-sm">Selalu ada diskon flash sale setiap hari.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="py-24">
        <div class="max-w-3xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-white text-center mb-12">Frequently Asked Questions</h2>
            <div class="space-y-4">
                <div x-data="{ open: false }" class="glass-panel rounded-2xl overflow-hidden">
                    <button @click="open = !open" class="flex items-center justify-between w-full p-5 text-left text-white font-bold hover:bg-white/5 transition">
                        <span>Bagaimana cara membeli gamenya?</span>
                        <svg class="w-5 h-5 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open" class="p-5 pt-0 text-gray-400 text-sm leading-relaxed" style="display: none;">
                        Pilih game favoritmu yang ingin kamu beli dan selesaikan pembayaran. Game akan langsung dikirim secara otomatis ke akun atau email kamu.
                    </div>
                </div>
                
                <div x-data="{ open: false }" class="glass-panel rounded-2xl overflow-hidden">
                    <button @click="open = !open" class="flex items-center justify-between w-full p-5 text-left text-white font-bold hover:bg-white/5 transition">
                        <span>Metode pembayaran apa yang tersedia?</span>
                        <svg class="w-5 h-5 transform transition-transform" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    <div x-show="open" class="p-5 pt-0 text-gray-400 text-sm leading-relaxed" style="display: none;">
                        Kami mendukung QRIS (GoPay, OVO, Dana), Virtual Account Bank (BCA, Mandiri, BRI, BNI), dan Alfamart/Indomaret.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-black border-t border-white/5 pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
                <div class="md:col-span-5">
                    <span class="font-black text-2xl text-white">Game<span class="text-sky-500">Store</span>.</span>
                    <p class="text-gray-500 mt-6 leading-relaxed max-w-sm">
                        Platform marketplace voucher game terpercaya di Indonesia. Memberikan pengalaman belanja yang aman, cepat, dan instan.
                    </p>
                    <div class="flex gap-4 mt-8">
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-sky-500 hover:text-white transition text-gray-400">
                           <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-sky-500 hover:text-white transition text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>
                
                <div class="md:col-span-2"></div>

                <div class="md:col-span-2">
                    <h4 class="text-white font-bold mb-6">Support</h4>
                    <ul class="space-y-4 text-sm text-gray-500">
                        <li>
                            <a href="https://wa.me/6281390463237?text=Halo%20Admin%20GameStore,%20saya%20ingin%20bertanya" target="_blank" class="hover:text-sky-500 transition">
                                WhatsApp Admin
                            </a>
                        </li>
                        <li><a href="#" class="hover:text-sky-500 transition">Email Support</a></li>
                        <li><a href="#" class="hover:text-sky-500 transition">FAQ</a></li>
                    </ul>
                </div>

                <div class="md:col-span-3">
                    <h4 class="text-white font-bold mb-6">Newsletter</h4>
                    <form class="space-y-4">
                        <div class="relative">
                            <input type="email" placeholder="Email kamu" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-sky-500 transition">
                            <button class="absolute right-2 top-2 bottom-2 bg-sky-600 text-white px-4 rounded-md text-xs font-bold hover:bg-sky-700 transition">
                                SUB
                            </button>
                        </div>
                        <p class="text-xs text-gray-600">Dapatkan info promo spesial mingguan.</p>
                    </form>
                </div>
            </div>

            <div class="border-t border-white/5 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-600 font-medium">
                <p>&copy; {{ date('Y') }} GameStore Inc. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-gray-400">Privacy Policy</a>
                    <a href="#" class="hover:text-gray-400">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>