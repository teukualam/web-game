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
                <h1 class="text-3xl md:text-5xl font-black text-gray-900 dark:text-white uppercase italic tracking-tighter">
                    Syarat & <span class="text-blue-600">Ketentuan</span>
                </h1>
                <div class="h-1.5 w-24 bg-blue-600 mx-auto mt-4 rounded-full shadow-[0_0_15px_rgba(37,99,235,0.4)]"></div>
            </div>

            <div class="bg-white dark:bg-gray-900 rounded-[2.5rem] p-8 md:p-12 shadow-xl border border-gray-100 dark:border-gray-800">
                <div class="space-y-10 text-gray-600 dark:text-gray-400 leading-relaxed">
                    
                    <div class="relative pl-4 border-l-4 border-blue-600">
                        <h3 class="font-black text-gray-900 dark:text-white uppercase italic text-xl mb-3 tracking-tighter text-left">
                            01. Produk Digital & Lisensi
                        </h3>
                        <p class="text-sm md:text-base text-left">
                            Semua game yang dibeli di <span class="text-blue-600 font-bold">Fazynsyy Store</span> berupa produk digital (Key, Link Gift, atau Akun). Kami menjamin produk yang kami jual adalah **100% Legal dan Original**.
                        </p>
                    </div>
                    
                    <div class="relative pl-4 border-l-4 border-blue-600">
                        <h3 class="font-black text-gray-900 dark:text-white uppercase italic text-xl mb-3 tracking-tighter text-left">
                            02. Serah Terima Game
                        </h3>
                        <p class="text-sm md:text-base text-left">
                            Setelah pembayaran dikonfirmasi, data game akan dikirimkan ke kontak atau akun Anda. Pembeli wajib segera mengamankan (mengganti password/bind) jika produk berupa akun game demi keamanan bersama.
                        </p>
                    </div>

                    <div class="relative pl-4 border-l-4 border-blue-600">
                        <h3 class="font-black text-gray-900 dark:text-white uppercase italic text-xl mb-3 tracking-tighter text-left">
                            03. Kebijakan Refund
                        </h3>
                        <p class="text-sm md:text-base text-left">
                            Refund hanya berlaku jika produk yang kami berikan **tidak bisa diaktifkan (Invalid)**. Refund tidak berlaku jika pembeli salah memilih judul game atau perangkat (device) yang tidak mendukung spesifikasi game.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>