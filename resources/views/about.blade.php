<x-app-layout>
    {{-- CSS Tambahan untuk Lenis agar tidak ada lag saat scroll --}}
    <style>
        html.lenis {
            height: auto;
        }
        .lenis.lenis-smooth {
            scroll-behavior: auto !important;
        }
        .lenis.lenis-smooth [data-lenis-prevent] {
            overscroll-behavior: contain;
        }
        .lenis.lenis-stopped {
            overflow: hidden;
        }
    </style>

    <div class="py-8 bg-gray-50 dark:bg-gray-950 min-h-screen transition-colors">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Tombol Kembali ke Dashboard --}}
            <div class="mb-10">
                <a href="{{ route('dashboard') }}" 
                   class="inline-flex items-center gap-3 px-5 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:border-blue-500/50 transition-all duration-300 group shadow-sm">
                    <i class="fas fa-arrow-left text-sm transition-transform duration-300 group-hover:-translate-x-1"></i>
                    <span class="text-sm font-black uppercase italic tracking-tighter">Kembali ke Dashboard</span>
                </a>
            </div>

            {{-- Header Section --}}
            <div class="text-center mb-16">
                <img src="{{ asset('assets/Roket.png') }}" alt="Logo" class="h-28 mx-auto mb-6 drop-shadow-2xl animate-bounce">
                <h1 class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white uppercase italic tracking-tighter">
                    Tentang <span class="text-blue-600">Fazynsyy Store</span>
                </h1>
                <div class="h-2 w-24 bg-blue-600 mx-auto mt-4 rounded-full shadow-[0_0_20px_rgba(37,99,235,0.5)]"></div>
            </div>

            {{-- Cerita Singkat --}}
            <div class="bg-white dark:bg-gray-900 rounded-[2.5rem] p-8 md:p-12 shadow-xl border border-gray-100 dark:border-gray-800 mb-12">
                <div class="flex flex-col md:flex-row gap-8 items-center">
                    <div class="flex-1">
                        <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-6 uppercase italic tracking-tighter">Siapa Kami?</h2>
                        <div class="space-y-4 text-gray-600 dark:text-gray-400 leading-relaxed text-lg">
                            <p>
                                <span class="text-blue-600 font-bold uppercase">Fazynsyy Store</span> didirikan dengan satu tujuan utama: Memberikan pengalaman membeli game yang paling mudah, murah, dan aman bagi seluruh gamer di Indonesia.
                            </p>
                            <p>
                                Kami memahami bahwa kecepatan dan keaslian adalah kunci dalam dunia gaming. Sejak berdiri pada tahun <span class="text-gray-900 dark:text-white font-bold">2026</span>, kami telah melayani ribuan transaksi game populer dengan tingkat kepercayaan mencapai <span class="text-green-500 font-bold">99.9%</span>.
                            </p>
                        </div>
                    </div>
                    <div class="hidden md:block w-px h-40 bg-gray-100 dark:bg-gray-800"></div>
                    <div class="flex-1 text-center">
                        <div class="text-5xl font-black text-blue-600 mb-2 italic tracking-tighter">100%</div>
                        <p class="text-sm font-bold uppercase tracking-widest text-gray-500">Produk Original & Legal</p>
                    </div>
                </div>
            </div>

            {{-- Keunggulan --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16 text-left">
                {{-- Card 1 --}}
                <div class="bg-blue-600 p-8 rounded-[2rem] text-white shadow-lg shadow-blue-500/20 transform hover:-translate-y-2 transition duration-500">
                    <i class="fas fa-bolt text-4xl mb-6"></i>
                    <h3 class="font-black text-xl mb-3 italic uppercase tracking-tighter text-left">PROSES KILAT</h3>
                    <p class="text-blue-100 text-sm leading-relaxed">Pesanan Anda dikirimkan secara otomatis dalam hitungan detik setelah pembayaran terverifikasi.</p>
                </div>
                
                {{-- Card 2 --}}
                <div class="bg-gray-900 dark:bg-blue-900/40 p-8 rounded-[2rem] text-white border border-blue-500/30 shadow-lg transform hover:-translate-y-2 transition duration-500">
                    <i class="fas fa-shield-alt text-4xl mb-6 text-blue-400"></i>
                    <h3 class="font-black text-xl mb-3 italic uppercase tracking-tighter text-blue-400 text-left">100% AMAN</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">Kami menjamin keamanan data game Anda karena kami hanya menggunakan jalur distribusi resmi dan legal.</p>
                </div>

                {{-- Card 3 --}}
                <div class="bg-white dark:bg-gray-800 p-8 rounded-[2rem] text-gray-800 dark:text-white border border-gray-100 dark:border-gray-700 shadow-xl transform hover:-translate-y-2 transition duration-500">
                    <i class="fas fa-headset text-4xl mb-6 text-blue-600"></i>
                    <h3 class="font-black text-xl mb-3 italic uppercase tracking-tighter text-left">SUPPORT ADMIN</h3>
                    <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">Tim bantuan kami siap melayani Anda setiap hari untuk memastikan pengalaman belanja terbaik.</p>
                </div>
            </div>

            {{-- Kontak Section --}}
            <div class="relative overflow-hidden bg-gradient-to-r from-blue-600 to-blue-800 rounded-[2.5rem] p-10 md:p-16 text-white text-center shadow-2xl shadow-blue-500/30">
                {{-- Aksesoris Desain --}}
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-64 h-64 bg-blue-400/20 rounded-full blur-3xl"></div>

                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl font-black mb-6 italic uppercase tracking-tighter">Butuh Bantuan Lebih Lanjut?</h2>
                    <p class="mb-10 opacity-90 max-w-2xl mx-auto text-lg">Jangan ragu untuk menghubungi tim admin kami jika ada pertanyaan mengenai produk atau butuh bantuan transaksi.</p>
                    
                    <a href="https://wa.me/6281390463237" target="_blank" 
                       class="inline-flex items-center gap-3 bg-white text-blue-600 px-10 py-4 rounded-2xl font-black uppercase italic hover:bg-gray-100 transition shadow-xl hover:scale-105 active:scale-95 duration-200">
                        <i class="fab fa-whatsapp text-2xl"></i>
                        Hubungi WhatsApp Admin
                    </a>
                </div>
            </div>

        </div>
    </div>

    {{-- SCRIPTS: Memanggil Lenis untuk Smooth Scroll di Halaman About --}}
    <script src="https://unpkg.com/lenis@1.1.20/dist/lenis.min.js"></script> 
    <script>
        const lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), 
            direction: 'vertical',
            gestureDirection: 'vertical',
            smooth: true,
            mouseMultiplier: 1,
            smoothTouch: false,
            touchMultiplier: 2,
            infinite: false,
        })

        function raf(time) {
            lenis.raf(time)
            requestAnimationFrame(raf)
        }

        requestAnimationFrame(raf)

        // Sedikit script agar link anchor tetap bekerja mulus
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                lenis.scrollTo(this.getAttribute('href'))
            });
        });
    </script>
</x-app-layout>