<footer class="bg-white dark:bg-gray-950 border-t border-gray-200 dark:border-gray-800 pt-16 pb-8 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-12">
            {{-- Kolom 1: Branding (Kita buat lebih lebar agar logo besar tidak jomplang) --}}
            <div class="col-span-1 md:col-span-5 flex flex-col items-center md:items-start text-center md:text-left">
                <div class="mb-6 group">
                    {{-- Ukuran h-24 sampai h-28 adalah ukuran ideal untuk logo besar --}}
                    <img src="{{ asset('assets/Roket.png') }}" 
                         alt="Fazynsyy Logo" 
                         class="h-24 md:h-28 w-auto object-contain transition-transform duration-500 group-hover:scale-105">
                </div>
                <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed max-w-sm mb-6">
                    <span class="text-blue-600 font-black">Fazynsyy Store</span> adalah platform beli game termurah dan tercepat di Indonesia. Kami menyediakan layanan 24 jam untuk kebutuhan gaming Anda.
                </p>
                {{-- Social Media --}}
                <div class="flex gap-4">
                    <a href="https://instagram.com/teukualamfaziiansyah" target="_blank" class="w-11 h-11 rounded-2xl bg-gray-100 dark:bg-gray-900 flex items-center justify-center text-gray-600 dark:text-gray-400 hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="https://tiktok.com/@fazynsyy" target="_blank" class="w-11 h-11 rounded-2xl bg-gray-100 dark:bg-gray-900 flex items-center justify-center text-gray-600 dark:text-gray-400 hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                        <i class="fab fa-tiktok text-xl"></i>
                    </a>
                    <a href="https://wa.me/6281390463237" target="_blank" class="w-11 h-11 rounded-2xl bg-gray-100 dark:bg-gray-900 flex items-center justify-center text-gray-600 dark:text-gray-400 hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                        <i class="fab fa-whatsapp text-xl"></i>
                    </a>
                </div>
            </div>

            {{-- Kolom 2: Link Cepat --}}
            <div class="col-span-1 md:col-span-2 text-center md:text-left">
                <h4 class="text-gray-900 dark:text-white font-black uppercase tracking-tighter text-sm mb-6 italic">Peta Situs</h4>
                <ul class="space-y-4 text-sm text-gray-500 dark:text-gray-400">
                    <li><a href="#" class="hover:text-blue-600 transition-colors italic">Semua Game</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition-colors italic">Cek Pesanan</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-blue-600 transition-colors italic">Tentang Kami</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Bantuan --}}
            <div class="col-span-1 md:col-span-2 text-center md:text-left">
                <h4 class="text-gray-900 dark:text-white font-black uppercase tracking-tighter text-sm mb-6 italic">Bantuan</h4>
                <ul class="space-y-4 text-sm text-gray-500 dark:text-gray-400">
                    <li><a href="{{ route('terms') }}" class="hover:text-blue-600 transition-colors italic">S & K</a></li>
                    <li><a href="{{ route('privacy') }}" class="hover:text-blue-600 transition-colors italic">Privasi</a></li>
                    <li><a href="https://wa.me/6281390463237" target="_blank" class="hover:text-blue-600 transition-colors italic">Hubungi Admin</a></li>
                </ul>
            </div>

            {{-- Kolom 4: Status --}}
            <div class="col-span-1 md:col-span-3">
                <h4 class="text-center md:text-left text-gray-900 dark:text-white font-black uppercase tracking-tighter text-sm mb-6 italic">Status Layanan</h4>
                <div class="p-6 rounded-3xl bg-blue-50/50 dark:bg-gray-900 border border-blue-100 dark:border-gray-800 shadow-sm">
                    <div class="flex items-center gap-3 mb-4 justify-center md:justify-start">
                        <span class="relative flex h-3 w-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                        </span>
                        <span class="text-[11px] font-black text-gray-700 dark:text-gray-200 uppercase tracking-widest">Sistem Aktif 24/7</span>
                    </div>
                    <p class="text-[11px] text-center md:text-left text-gray-500 dark:text-gray-400 leading-relaxed">
                        Membeli game tanpa menunggu admin. CS aktif: 09.00 - 22.00 WIB.
                    </p>
                </div>
            </div>
        </div>

        {{-- Bottom --}}
        <div class="pt-8 border-t border-gray-100 dark:border-gray-800 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-gray-500 dark:text-gray-400 text-[10px] uppercase tracking-[0.2em]">
                &copy; 2026 <span class="text-blue-600 font-black">Fazynsyy Store</span>. All rights reserved.
            </p>
        </div>
    </div>
</footer>