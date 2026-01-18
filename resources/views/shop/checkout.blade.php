<x-app-layout>
    <div class="py-12 bg-gray-50 dark:bg-[#0b0f1a] min-h-screen transition-colors duration-300" 
         x-data="{ 
            openModal: false, 
            paymentMethod: 'BCA',
            accounts: {
                'BCA': '123-456-789',
                'MANDIRI': '133-001-992-888',
                'BRI': '0206-01-009812-50-3',
                'DANA': '0813-9046-3237',
                'GOPAY': '0813-9046-3237',
                'OVO': '0813-9046-3237'
            }
         }">
         
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Breadcrumb --}}
            <div class="text-sm text-gray-500 dark:text-gray-400 mb-6 flex items-center gap-2">
                <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition font-medium">Beranda</a> 
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                <span class="text-gray-900 dark:text-white font-bold">Checkout</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                {{-- Kiri: Ringkasan --}}
                <div class="md:col-span-1">
                    <div class="bg-white dark:bg-[#161d2f] rounded-3xl shadow-xl border border-gray-100 dark:border-gray-800 overflow-hidden sticky top-24">
                        
                        <div class="bg-gray-50 dark:bg-[#0f172a] px-6 py-4 border-b border-gray-100 dark:border-gray-800">
                            <h3 class="font-bold text-gray-800 dark:text-white flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                                </svg>
                                Ringkasan Pesanan
                            </h3>
                        </div>

                        <div class="p-6">
                            <div class="relative aspect-video rounded-2xl overflow-hidden shadow-md mb-5 group">
                                <img src="{{ asset('storage/' . $game->cover_image) }}" class="w-full h-full object-cover transform transition duration-500 group-hover:scale-105">
                                <div class="absolute top-2 left-2 bg-blue-600/90 backdrop-blur text-white text-[10px] font-black px-2 py-1 rounded-lg tracking-wide uppercase">
                                    Digital Product
                                </div>
                            </div>
                            
                            <h2 class="text-xl font-black text-gray-900 dark:text-white leading-tight mb-2 italic uppercase tracking-tighter">{{ $game->name }}</h2>
                            <div class="flex items-center gap-2 mb-4">
                                <span class="bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 text-[10px] font-black px-2 py-1 rounded-md uppercase tracking-wider">
                                    {{ $game->category->name ?? 'GAME' }}
                                </span>
                                <span class="text-gray-400 text-xs">•</span>
                                <span class="text-emerald-600 text-[10px] font-black bg-emerald-50 dark:bg-emerald-900/20 px-2 py-1 rounded-md uppercase">Ready Stock</span>
                            </div>

                            <div class="space-y-2 mb-6 bg-gray-50 dark:bg-[#0f172a] p-4 rounded-2xl border border-gray-100 dark:border-gray-800">
                                <div class="flex items-center gap-2 text-[11px] font-bold text-gray-600 dark:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span>PENGIRIMAN INSTAN</span>
                                </div>
                                <div class="flex items-center gap-2 text-[11px] font-bold text-gray-600 dark:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span>GARANSI LENGKAP</span>
                                </div>
                            </div>

                            <div class="border-t border-dashed border-gray-300 dark:border-gray-700 my-4"></div>

                            <div class="space-y-3">
                                <div class="flex justify-between text-sm text-gray-500">
                                    <span>Harga Produk</span>
                                    <span class="font-bold dark:text-white">Rp {{ number_format($game->price, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between text-sm text-gray-500">
                                    <span>Biaya Layanan</span>
                                    <span class="text-emerald-600 font-black tracking-widest">FREE</span>
                                </div>
                                <div class="flex justify-between items-center pt-3 mt-2 border-t border-gray-100 dark:border-gray-800">
                                    <span class="font-black text-gray-800 dark:text-white italic uppercase">Total</span>
                                    <span class="font-black text-2xl text-blue-600 dark:text-blue-500 italic">Rp {{ number_format($game->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kanan: Form --}}
                <div class="md:col-span-2">
                    <div class="bg-white dark:bg-[#161d2f] p-8 rounded-[2rem] shadow-sm border border-gray-200 dark:border-gray-800">
                        <h3 class="font-black text-gray-900 dark:text-white mb-8 text-xl flex items-center gap-3 border-b dark:border-gray-800 pb-5 italic uppercase">
                            <span class="bg-blue-600 text-white w-10 h-10 rounded-2xl flex items-center justify-center text-lg font-black shadow-lg shadow-blue-500/30">1</span>
                            Metode Pembayaran
                        </h3>
                        
                        <form action="{{ route('game.store', $game) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="space-y-4 mb-8">
                                <div class="space-y-3">
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3 ml-1">Transfer Bank (Cek Manual)</p>
                                    
                                    {{-- BCA --}}
                                    <label class="relative flex items-center p-5 border-2 rounded-2xl cursor-pointer transition-all duration-300 group"
                                           :class="paymentMethod === 'BCA' ? 'border-blue-600 bg-blue-50/30 dark:bg-blue-900/10 shadow-lg' : 'border-gray-100 dark:border-gray-800 hover:border-blue-400'">
                                        <input type="radio" name="payment_method" value="BCA" class="sr-only" x-model="paymentMethod">
                                        <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center mr-4"
                                             :class="paymentMethod === 'BCA' ? 'border-blue-600' : 'border-gray-300 group-hover:border-blue-400'">
                                            <div class="w-3 h-3 rounded-full bg-blue-600" x-show="paymentMethod === 'BCA'"></div>
                                        </div>
                                        <div class="flex-1">
                                            <span class="block font-black text-gray-800 dark:text-white">BANK BCA</span>
                                            <span class="text-[10px] font-bold text-emerald-600" x-show="paymentMethod === 'BCA'">Admin Fee: Rp 0</span>
                                        </div>
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/1200px-Bank_Central_Asia.svg.png" class="h-6 w-auto grayscale group-hover:grayscale-0 transition duration-300">
                                    </label>

                                    {{-- MANDIRI --}}
                                    <label class="relative flex items-center p-5 border-2 rounded-2xl cursor-pointer transition-all duration-300 group"
                                           :class="paymentMethod === 'MANDIRI' ? 'border-blue-600 bg-blue-50/30 dark:bg-blue-900/10 shadow-lg' : 'border-gray-100 dark:border-gray-800 hover:border-blue-400'">
                                        <input type="radio" name="payment_method" value="MANDIRI" class="sr-only" x-model="paymentMethod">
                                        <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center mr-4"
                                             :class="paymentMethod === 'MANDIRI' ? 'border-blue-600' : 'border-gray-300 group-hover:border-blue-400'">
                                            <div class="w-3 h-3 rounded-full bg-blue-600" x-show="paymentMethod === 'MANDIRI'"></div>
                                        </div>
                                        <div class="flex-1 font-black text-gray-800 dark:text-white uppercase">BANK MANDIRI</div>
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Bank_Mandiri_logo_2016.svg/2560px-Bank_Mandiri_logo_2016.svg.png" class="h-5 w-auto grayscale group-hover:grayscale-0 transition duration-300">
                                    </label>

                                    {{-- BRI --}}
                                    <label class="relative flex items-center p-5 border-2 rounded-2xl cursor-pointer transition-all duration-300 group"
                                           :class="paymentMethod === 'BRI' ? 'border-blue-600 bg-blue-50/30 dark:bg-blue-900/10 shadow-lg' : 'border-gray-100 dark:border-gray-800 hover:border-blue-400'">
                                        <input type="radio" name="payment_method" value="BRI" class="sr-only" x-model="paymentMethod">
                                        <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center mr-4"
                                             :class="paymentMethod === 'BRI' ? 'border-blue-600' : 'border-gray-300 group-hover:border-blue-400'">
                                            <div class="w-3 h-3 rounded-full bg-blue-600" x-show="paymentMethod === 'BRI'"></div>
                                        </div>
                                        <div class="flex-1 font-black text-gray-800 dark:text-white uppercase">BANK BRI</div>
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/BANK_BRI_logo.svg/2560px-BANK_BRI_logo.svg.png" class="h-6 w-auto grayscale group-hover:grayscale-0 transition duration-300">
                                    </label>
                                </div>

                                <div class="space-y-3 pt-4">
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3 ml-1">E-Wallet / QRIS</p>

                                    <div class="flex flex-col gap-4">
                                        {{-- DANA --}}
                                        <label class="relative flex items-center p-4 border-2 rounded-2xl cursor-pointer transition-all duration-300 group"
                                               :class="paymentMethod === 'DANA' ? 'border-blue-600 bg-blue-50/30 dark:bg-blue-900/10 shadow-lg' : 'border-gray-100 dark:border-gray-800 hover:border-blue-400'">
                                            <input type="radio" name="payment_method" value="DANA" class="sr-only" x-model="paymentMethod">
                                            <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center mr-3"
                                                 :class="paymentMethod === 'DANA' ? 'border-blue-600' : 'border-gray-300 group-hover:border-blue-400'">
                                                <div class="w-2.5 h-2.5 rounded-full bg-blue-600" x-show="paymentMethod === 'DANA'"></div>
                                            </div>
                                            <div class="flex-1 font-black text-gray-800 dark:text-white">DANA</div>
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Logo_dana_blue.svg/2560px-Logo_dana_blue.svg.png" class="h-5 w-auto grayscale group-hover:grayscale-0 transition duration-300">
                                        </label>

                                        {{-- GOPAY --}}
                                        <label class="relative flex items-center p-4 border-2 rounded-2xl cursor-pointer transition-all duration-300 group"
                                               :class="paymentMethod === 'GOPAY' ? 'border-blue-600 bg-blue-50/30 dark:bg-blue-900/10 shadow-lg' : 'border-gray-100 dark:border-gray-800 hover:border-blue-400'">
                                            <input type="radio" name="payment_method" value="GOPAY" class="sr-only" x-model="paymentMethod">
                                            <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center mr-3"
                                                 :class="paymentMethod === 'GOPAY' ? 'border-blue-600' : 'border-gray-300 group-hover:border-blue-400'">
                                                <div class="w-2.5 h-2.5 rounded-full bg-blue-600" x-show="paymentMethod === 'GOPAY'"></div>
                                            </div>
                                            <div class="flex-1 font-black text-gray-800 dark:text-white">GOPAY</div>
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/Gopay_logo.svg/2560px-Gopay_logo.svg.png" class="h-5 w-auto grayscale group-hover:grayscale-0 transition duration-300">
                                        </label>

                                        {{-- OVO --}}
                                        <label class="relative flex items-center p-4 border-2 rounded-2xl cursor-pointer transition-all duration-300 group"
                                               :class="paymentMethod === 'OVO' ? 'border-blue-600 bg-blue-50/30 dark:bg-blue-900/10 shadow-lg' : 'border-gray-100 dark:border-gray-800 hover:border-blue-400'">
                                            <input type="radio" name="payment_method" value="OVO" class="sr-only" x-model="paymentMethod">
                                            <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center mr-3"
                                                 :class="paymentMethod === 'OVO' ? 'border-blue-600' : 'border-gray-300 group-hover:border-blue-400'">
                                                <div class="w-2.5 h-2.5 rounded-full bg-blue-600" x-show="paymentMethod === 'OVO'"></div>
                                            </div>
                                            <div class="flex-1 font-black text-gray-800 dark:text-white">OVO</div>
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Logo_ovo_purple.svg/2560px-Logo_ovo_purple.svg.png" class="h-4 w-auto grayscale group-hover:grayscale-0 transition duration-300">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button type="button" 
                                    @click="openModal = true"
                                    class="w-full bg-gradient-to-r from-blue-700 to-blue-600 text-white py-5 rounded-2xl font-black text-lg hover:shadow-2xl hover:shadow-blue-500/50 transform hover:-translate-y-1 transition duration-300 flex items-center justify-center gap-3 uppercase tracking-wider italic">
                                <span>Bayar Sekarang</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </button>

                            {{-- MODAL REVISI (LEBIH KECIL) --}}
                            <div x-show="openModal" style="display: none;" 
                                 class="fixed inset-0 z-[200] flex items-center justify-center px-4 bg-black/80 backdrop-blur-sm"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0"
                                 x-transition:enter-end="opacity-100">
                                
                                <div class="bg-white dark:bg-[#161d2f] rounded-[2rem] shadow-2xl max-w-md w-full overflow-hidden border dark:border-gray-800"
                                     @click.away="openModal = false">
                                    
                                    <div class="bg-blue-600 p-6 text-center text-white">
                                        <div class="mx-auto w-12 h-12 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-3 border border-white/30">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-black uppercase italic">Instruksi Pembayaran</h3>
                                    </div>

                                    <div class="p-6 space-y-5">
                                        <div class="text-center">
                                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Total Transfer</p>
                                            <p class="text-3xl font-black text-blue-600 dark:text-blue-500 italic">Rp {{ number_format($game->price, 0, ',', '.') }}</p>
                                        </div>

                                        <div class="bg-gray-50 dark:bg-[#0f172a] p-4 rounded-2xl border border-gray-200 dark:border-gray-800">
                                            <div class="flex justify-between items-center mb-3 pb-3 border-b dark:border-gray-800">
                                                <span class="text-[10px] font-black text-gray-500 uppercase">Tujuan</span>
                                                <span class="font-black text-gray-900 dark:text-white text-sm uppercase italic" x-text="paymentMethod"></span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-[10px] font-black text-gray-500 uppercase">No Rekening</span>
                                                <div class="flex items-center gap-2">
                                                    <span class="font-mono font-black text-blue-600 dark:text-blue-400" x-text="accounts[paymentMethod]"></span>
                                                    <button type="button" @click="navigator.clipboard.writeText(accounts[paymentMethod])" class="text-gray-400 hover:text-blue-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2" /></svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-y-2">
                                            <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest ml-1">Upload Bukti</label>
                                            <input type="file" name="payment_proof" required accept="image/*"
                                                   class="block w-full text-[10px] text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-blue-600 file:text-white border border-gray-200 dark:border-gray-800 rounded-xl bg-white dark:bg-transparent focus:outline-none">
                                        </div>

                                        <div class="flex gap-3 pt-2">
                                            <button type="button" @click="openModal = false" class="flex-1 py-3 rounded-xl font-black text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition text-[10px] uppercase tracking-widest border border-gray-200 dark:border-gray-800">
                                                Batal
                                            </button>
                                            <button type="submit" class="flex-[2] bg-blue-600 text-white py-3 rounded-xl font-black hover:bg-blue-700 transition shadow-lg shadow-blue-500/20 text-[10px] uppercase tracking-widest italic">
                                                Konfirmasi
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>