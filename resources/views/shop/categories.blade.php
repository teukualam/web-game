<x-app-layout>
    <div class="min-h-screen bg-gray-50 relative overflow-hidden">
        
        <!-- Decorative Background Pattern -->
        <div class="absolute inset-0 z-0 opacity-[0.03]" 
             style="background-image: radial-gradient(#ea580c 1px, transparent 1px); background-size: 32px 32px;">
        </div>

        <!-- decorative blobs -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-96 bg-gradient-to-b from-orange-100/50 to-transparent blur-3xl -z-10"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            
            <!-- Header Section -->
            <div class="text-center mb-16 relative">
                <span class="inline-block py-1 px-3 rounded-full bg-orange-100 text-orange-600 text-xs font-bold tracking-widest uppercase mb-4 border border-orange-200">
                    Katalog Lengkap
                </span>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight mb-4">
                    Jelajahi <span class="relative inline-block">
                        <span class="relative z-10 text-transparent bg-clip-text bg-gradient-to-r from-orange-600 via-red-500 to-rose-600">Dunia Game</span>
                        <span class="absolute bottom-2 left-0 w-full h-3 bg-orange-200/50 -z-0 skew-x-12"></span>
                    </span>
                </h2>
                <p class="text-gray-500 max-w-2xl mx-auto text-lg leading-relaxed">
                    Temukan petualangan berikutnya dari ribuan koleksi kami. Filter berdasarkan genre favoritmu untuk pengalaman bermain yang lebih spesifik.
                </p>
            </div>

            <!-- Grid Categories -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">
                @forelse($categories as $category)
                    <a href="{{ route('category.games', $category->slug) }}" 
                       class="group relative bg-white rounded-3xl p-1 shadow-sm hover:shadow-[0_20px_50px_rgba(234,88,12,0.15)] transition-all duration-500 h-full flex flex-col">
                        
                        <!-- Card Border Gradient Effect (Invisible normally, shows on hover) -->
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-400 to-red-600 rounded-3xl opacity-0 group-hover:opacity-100 transition duration-500"></div>

                        <!-- Card Content Container -->
                        <div class="relative h-full bg-white rounded-[22px] p-6 md:p-8 overflow-hidden flex flex-col items-center text-center z-10">
                            
                            <!-- Decorative Circle Background -->
                            <div class="absolute top-0 inset-x-0 h-32 bg-gradient-to-b from-gray-50 to-transparent opacity-50"></div>
                            
                            <!-- Icon Container -->
                            <div class="relative mb-6 group-hover:-translate-y-2 transition duration-500 ease-out">
                                <div class="absolute inset-0 bg-orange-200 rounded-2xl blur-xl opacity-0 group-hover:opacity-40 transition duration-500"></div>
                                <div class="w-20 h-20 bg-gradient-to-br from-white to-gray-50 rounded-2xl border border-gray-100 shadow-inner flex items-center justify-center relative z-10 group-hover:shadow-lg group-hover:scale-110 transition duration-500">
                                    <!-- Dynamic Icon Logic (Optional: check category name/slug to change icon) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-gray-400 group-hover:text-orange-500 transition duration-500">
                                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Zm3.75-1.5a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5h-1.5Zm-2.25 0a.75.75 0 0 0 0 1.5h.75a.75.75 0 0 0 0-1.5h-.75ZM6 10.5a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 6 10.5Zm2.25 0a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-1.5 0v-.75a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                
                                <!-- Count Badge Floating -->
                                <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-white border border-gray-100 text-gray-600 text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm whitespace-nowrap z-20">
                                    {{ $category->games_count }} ITEMS
                                </div>
                            </div>

                            <!-- Text Content -->
                            <div class="mt-2">
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-orange-600 group-hover:to-red-600 transition duration-300">
                                    {{ $category->name }}
                                </h3>
                                <p class="text-sm text-gray-400 mt-2 line-clamp-2 opacity-0 group-hover:opacity-100 transition duration-500 translate-y-4 group-hover:translate-y-0 absolute inset-x-0 -bottom-4 bg-white/90">
                                    Lihat koleksi {{ strtolower($category->name) }} kami.
                                </p>
                            </div>

                            <!-- Action Arrow (Bottom Right) -->
                            <div class="absolute bottom-0 right-0 p-4 opacity-0 group-hover:opacity-100 translate-x-4 group-hover:translate-x-0 transition duration-500">
                                <div class="bg-orange-50 text-orange-600 p-2 rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <!-- Empty State Design -->
                    <div class="col-span-full py-20 text-center">
                        <div class="relative w-40 h-40 mx-auto mb-6">
                            <div class="absolute inset-0 bg-gray-100 rounded-full animate-pulse"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-16 h-16 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Kategori Kosong</h3>
                        <p class="text-gray-500 mb-6">Sepertinya belum ada kategori yang ditambahkan.</p>
                        <a href="#" class="inline-flex items-center gap-2 px-6 py-2.5 bg-gray-900 text-white text-sm font-semibold rounded-full hover:bg-gray-800 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                            </svg>
                            Kembali ke Beranda
                        </a>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>