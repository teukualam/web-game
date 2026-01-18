<x-app-layout>
    <div class="py-8 bg-gray-50 dark:bg-gray-950 min-h-screen transition-colors">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <a href="{{ route('dashboard') }}" 
                   class="inline-flex items-center gap-3 px-5 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:border-blue-500/50 transition-all duration-300 group shadow-sm">
                    <i class="fas fa-arrow-left text-sm transition-transform duration-300 group-hover:-translate-x-1"></i>
                    <span class="text-sm font-black uppercase italic tracking-tighter">Kembali ke Dashboard</span>
                </a>
            </div>

            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-black text-gray-900 dark:text-white uppercase italic tracking-tighter">
                    Kebijakan <span class="text-blue-600">Privasi</span>
                </h1>
                <div class="h-1.5 w-24 bg-blue-600 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="bg-white dark:bg-gray-900 rounded-[2.5rem] p-8 md:p-12 shadow-xl border border-gray-100 dark:border-gray-800">
                <div class="space-y-10 text-gray-600 dark:text-gray-400 leading-relaxed text-left">
                    <p>
                        Di <span class="text-blue-600 font-bold italic uppercase">Fazynsyy Store</span>, kami sangat menjaga data privasi Anda saat melakukan pembelian game.
                    </p>
                    
                    <div class="relative pl-4 border-l-4 border-blue-600">
                        <h4 class="font-bold text-gray-900 dark:text-white uppercase italic mb-2 tracking-tighter">Penyimpanan Informasi</h4>
                        <p class="text-sm">Kami menyimpan riwayat pembelian Anda untuk memudahkan klaim garansi atau pengecekan jika di kemudian hari Anda kehilangan akses ke data game yang telah dibeli.</p>
                    </div>

                    <div class="relative pl-4 border-l-4 border-blue-600">
                        <h4 class="font-bold text-gray-900 dark:text-white uppercase italic mb-2 tracking-tighter">Keamanan Transaksi</h4>
                        <p class="text-sm">Semua detail pembayaran dan data pribadi dilindungi oleh sistem enkripsi tingkat tinggi. Kami tidak membagikan data pembeli ke pihak manapun.</p>
                    </div>
                </div>

                <div class="mt-12 flex justify-center opacity-50 grayscale">
                    <img src="{{ asset('assets/Roket.png') }}" class="h-10 w-auto" alt="Logo">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>