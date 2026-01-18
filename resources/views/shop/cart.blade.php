<x-app-layout>
    <div class="py-8 bg-gray-50 dark:bg-gray-950 min-h-screen transition-colors duration-300">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Tombol Kembali ke Dashboard --}}
            <div class="mb-8">
                <a href="{{ route('dashboard') }}" 
                   class="inline-flex items-center gap-3 px-5 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:border-blue-500/50 transition-all duration-300 group shadow-sm">
                    <i class="fas fa-arrow-left text-sm transition-transform duration-300 group-hover:-translate-x-1"></i>
                    <span class="text-sm font-black uppercase italic tracking-tighter">Kembali ke Dashboard</span>
                </a>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                
                <div class="flex-1">
                    {{-- Judul Halaman --}}
                    <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-8 uppercase italic tracking-tighter flex items-center gap-3">
                        <i class="fas fa-shopping-cart text-blue-600"></i>
                        Keranjang <span class="text-blue-600">Saya</span>
                        <span class="text-gray-400 dark:text-gray-500 text-lg font-bold ml-2">({{ $cartItems->count() }} Item)</span>
                    </h2>

                    @if($cartItems->isEmpty())
                        {{-- Tampilan Kosong --}}
                        <div class="bg-white dark:bg-gray-900 p-12 rounded-[2.5rem] shadow-xl text-center border border-gray-100 dark:border-gray-800 transition-all">
                            <div class="bg-blue-50 dark:bg-blue-900/20 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                                <i class="fas fa-shopping-basket text-4xl text-blue-400"></i>
                            </div>
                            <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-2 uppercase italic tracking-tighter">Keranjangmu Masih Kosong</h3>
                            <p class="text-gray-500 dark:text-gray-400 mb-8 font-medium">Yuk isi dengan game-game seru favoritmu sekarang!</p>
                            <a href="{{ route('dashboard') }}" class="inline-block bg-blue-600 text-white px-10 py-4 rounded-2xl font-black uppercase italic hover:bg-blue-700 transition shadow-lg shadow-blue-500/30 active:scale-95 duration-200">
                                Mulai Belanja
                            </a>
                        </div>
                    @else
                        {{-- List Item Keranjang --}}
                        <div class="space-y-4">
                            @php $totalTagihan = 0; @endphp
                            
                            @foreach($cartItems as $item)
                                @php $totalTagihan += $item->game->price; @endphp
                                
                                <div class="group bg-white dark:bg-gray-900 p-5 rounded-[2rem] shadow-sm border border-gray-200 dark:border-gray-800 flex flex-col sm:flex-row items-center gap-6 hover:border-blue-500/50 transition-all duration-300 relative overflow-hidden">
                                    
                                    <div class="w-full sm:w-32 h-32 flex-shrink-0 rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-800 shadow-md">
                                        <img src="{{ asset('storage/' . $item->game->cover_image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                    </div>
                                    
                                    <div class="flex-1 text-center sm:text-left w-full">
                                        <div class="flex flex-col sm:flex-row justify-between items-start">
                                            <div>
                                                <h3 class="font-black text-xl text-gray-800 dark:text-white mb-1 uppercase italic tracking-tighter group-hover:text-blue-600 transition">{{ $item->game->name }}</h3>
                                                <span class="bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-[10px] px-3 py-1 rounded-full font-black uppercase italic tracking-widest border border-blue-100 dark:border-blue-800">
                                                    {{ $item->game->category->name ?? 'Original Game' }}
                                                </span>
                                            </div>
                                            <div class="mt-3 sm:mt-0 text-right w-full sm:w-auto">
                                                <p class="text-blue-600 dark:text-blue-500 font-black text-2xl italic tracking-tighter">Rp {{ number_format($item->game->price, 0, ',', '.') }}</p>
                                            </div>
                                        </div>

                                        <div class="flex items-center justify-between sm:justify-end gap-4 mt-6 pt-4 border-t border-gray-100 dark:border-gray-800">
                                            
                                            <form action="{{ route('cart.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="flex items-center gap-2 text-gray-400 hover:text-red-500 transition-colors text-xs font-black uppercase italic tracking-tighter">
                                                    <i class="fas fa-trash-alt"></i>
                                                    <span>Hapus</span>
                                                </button>
                                            </form>

                                            <a href="{{ route('game.checkout', $item->game) }}" class="bg-gray-900 dark:bg-blue-600 text-white px-6 py-2.5 rounded-xl font-black text-xs uppercase italic tracking-widest hover:bg-blue-700 dark:hover:bg-blue-500 transition shadow-lg active:scale-95">
                                                Checkout Sekarang
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Ringkasan Belanja --}}
                @if(!$cartItems->isEmpty())
                <div class="w-full lg:w-1/3">
                    <div class="bg-white dark:bg-gray-900 p-8 rounded-[2.5rem] shadow-xl border border-gray-100 dark:border-gray-800 sticky top-24 transition-all">
                        <h3 class="font-black text-xl text-gray-900 dark:text-white mb-6 uppercase italic tracking-tighter border-b border-gray-100 dark:border-gray-800 pb-4">Ringkasan <span class="text-blue-600">Belanja</span></h3>
                        
                        <div class="flex justify-between items-center mb-4 text-gray-600 dark:text-gray-400 font-medium">
                            <span class="text-sm">Total Harga ({{ $cartItems->count() }} Game)</span>
                            <span class="font-bold text-gray-900 dark:text-white">Rp {{ number_format($totalTagihan, 0, ',', '.') }}</span>
                        </div>
                        
                        <div class="h-px w-full bg-gradient-to-r from-transparent via-gray-200 dark:via-gray-700 to-transparent my-6"></div>
                        
                        <div class="flex justify-between items-center mb-8">
                            <span class="font-black text-sm uppercase italic text-gray-500">Total Tagihan</span>
                            <span class="font-black text-3xl text-blue-600 dark:text-blue-500 italic tracking-tighter">Rp {{ number_format($totalTagihan, 0, ',', '.') }}</span>
                        </div>

                        <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-2xl border border-blue-100 dark:border-blue-900/30 text-[11px] text-blue-800 dark:text-blue-300 mb-8 font-bold uppercase italic leading-relaxed">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-info-circle text-lg mt-0.5"></i>
                                <p>Silakan checkout item yang diinginkan satu per satu untuk memproses lisensi game Anda.</p>
                            </div>
                        </div>

                        <a href="{{ route('dashboard') }}" class="block w-full text-center border-2 border-gray-100 dark:border-gray-800 text-gray-500 dark:text-gray-400 py-4 rounded-2xl font-black uppercase italic tracking-widest hover:border-blue-500 hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-300">
                            Tambah Game Lain
                        </a>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>