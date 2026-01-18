<x-app-layout>
    @php
        srand($game->id); 
        $persenDiskon = rand(10, 30); 
        $hargaAsli = $game->price / (1 - ($persenDiskon / 100));
    @endphp

    <div class="py-12 bg-gray-50 dark:bg-gray-950 min-h-screen font-sans transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600 dark:text-gray-400 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Dashboard
                </a>
            </div>

            <div class="bg-white dark:bg-gray-900 rounded-[2.5rem] shadow-2xl overflow-hidden border border-gray-100 dark:border-gray-800">
                <div class="grid grid-cols-1 lg:grid-cols-12">
                    
                    <div class="lg:col-span-5 bg-gray-100 dark:bg-gray-800/50 p-10 flex items-center justify-center">
                        <div class="relative w-full aspect-[3/4] rounded-3xl overflow-hidden shadow-2xl ring-1 ring-white/10">
                            <img src="{{ asset('storage/' . $game->cover_image) }}" 
                                 class="w-full h-full object-cover" 
                                 alt="{{ $game->name }}">
                            
                            <div class="absolute top-4 left-4">
                                <span class="bg-blue-600 text-white text-xs font-black px-3 py-1.5 rounded-xl uppercase shadow-lg">
                                    {{ $game->category->name ?? 'Premium' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-7 p-8 lg:p-12 flex flex-col">
                        <div class="mb-6">
                            <h1 class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white tracking-tighter italic uppercase mb-2">
                                {{ $game->name }}
                            </h1>
                            <div class="flex items-center gap-2 text-yellow-400 font-bold italic">
                                ★★★★★ <span class="ml-2 text-gray-400 text-sm italic">Produk Original</span>
                            </div>
                        </div>

                        <div class="bg-blue-50 dark:bg-blue-900/10 p-6 rounded-3xl border border-blue-100 dark:border-blue-900/30 mb-8 flex justify-between items-center">
                            <div>
                                <p class="text-xs text-blue-600 dark:text-blue-400 font-bold uppercase mb-1">Harga Sekarang</p>
                                <div class="flex items-baseline gap-3">
                                    <span class="text-4xl font-black text-gray-900 dark:text-white italic">Rp {{ number_format($game->price, 0, ',', '.') }}</span>
                                    <span class="text-lg text-gray-400 line-through font-medium">Rp {{ number_format($hargaAsli, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            <div class="bg-blue-600 text-white px-4 py-2 rounded-xl font-black text-sm rotate-3 shadow-lg">
                                -{{ $persenDiskon }}%
                            </div>
                        </div>

                        <div class="mb-10">
                            <h3 class="font-black text-gray-900 dark:text-white mb-3 text-lg border-b dark:border-gray-800 pb-2 italic uppercase">Deskripsi</h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed italic">
                                {{ $game->description }}
                            </p>
                        </div>

                        <div class="mt-auto flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-100 dark:border-gray-800">
                            <form action="{{ route('cart.store', $game->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit" class="w-full bg-transparent border-2 border-blue-600 text-blue-600 dark:text-blue-400 font-black py-4 rounded-2xl hover:bg-blue-600 hover:text-white transition duration-300 uppercase italic">
                                    + Keranjang
                                </button>
                            </form>

                            <a href="{{ route('game.checkout', $game->id) }}" 
                               class="flex-[1.5] bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl shadow-xl shadow-blue-500/30 text-center uppercase italic transition transform hover:-translate-y-1">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>