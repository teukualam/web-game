@php 
    $cartCount = Auth::check() ? \App\Models\CartItem::where('user_id', Auth::id())->count() : 0; 
@endphp

{{-- Navigasi Utama --}}
<nav x-data="{ openProfile: false, openMessages: false }" 
     class="bg-white dark:bg-gray-950 border-b border-blue-600 dark:border-gray-800 sticky top-0 z-[100] transition-colors duration-300 shadow-sm px-4">
    
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between py-4 gap-4 md:gap-8">
            
            {{-- LOGO (Sisi Kiri) --}}
            <div class="shrink-0">
                {{-- LOGIC: Jika admin, klik logo ke panel filament. Jika user, ke dashboard --}}
                <a href="{{ Auth::check() && Auth::user()->usertype === 'admin' ? url('/admin') : route('dashboard') }}" class="flex items-center gap-2 group">
                    <div class="bg-blue-600 p-2 rounded-xl text-white shadow-lg shadow-blue-500/30 group-hover:rotate-6 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                        </svg>
                    </div>
                    <span class="font-black text-xl text-gray-900 dark:text-white hidden sm:block tracking-tighter">Game<span class="text-blue-600">Store</span></span>
                </a>
            </div>

            {{-- SEARCH BAR --}}
            <div class="flex-1 min-w-0 max-w-2xl">
                <form action="{{ route('dashboard') }}" method="GET" class="relative group">
                    <input type="text" name="search" value="{{ request('search') }}" 
                        class="w-full bg-gray-100 dark:bg-gray-800 border-transparent dark:border-gray-700 text-gray-900 dark:text-gray-100 rounded-2xl py-2.5 pl-5 pr-12 focus:ring-2 focus:ring-blue-500 transition-all text-sm" 
                        placeholder="Cari game favoritmu...">
                    <button type="submit" class="absolute right-3 top-1.5 text-blue-600 p-1.5 rounded-xl hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </button>
                </form>
            </div>

            {{-- ACTIONS (Sisi Kanan) --}}
            <div class="flex items-center gap-2 md:gap-4 shrink-0">
                
                {{-- Toggle Tema --}}
                <button @click="darkMode = !darkMode" class="p-2 md:p-2.5 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-yellow-400 hover:scale-105 transition-all focus:outline-none">
                    <span x-show="!darkMode">🌙</span>
                    <span x-show="darkMode">☀️</span>
                </button>

                {{-- AREA PESAN --}}
                <div class="relative">
                    <button @click="openMessages = !openMessages; openProfile = false" 
                            class="relative p-2 md:p-2.5 text-gray-600 dark:text-gray-300 hover:text-blue-600 transition-colors focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                        </svg>
                        <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white dark:border-gray-950"></span>
                    </button>

                    {{-- Dropdown Pesan --}}
                    <div x-show="openMessages" 
                         @click.away="openMessages = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         style="display: none;"
                         class="absolute right-0 mt-3 w-80 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-2xl z-[150] overflow-hidden">
                        
                        <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-700 bg-blue-600 text-white">
                            <h3 class="font-bold text-sm">Notifikasi Pesanan</h3>
                        </div>
                        
                        <div class="max-h-64 overflow-y-auto">
                            <div class="p-4 border-b border-gray-50 dark:border-gray-700/50 hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors cursor-pointer">
                                <p class="text-[11px] text-gray-500 dark:text-gray-400">Klik "Lihat Semua" untuk melihat rincian CD-Key Anda.</p>
                            </div>
                        </div>

                        <a href="{{ route('pesan.index') }}" class="block w-full text-center py-3 text-xs font-bold text-gray-500 dark:text-gray-400 hover:text-blue-600 transition-colors bg-gray-50/50 dark:bg-gray-900/50">
                            Lihat Semua Pesan
                        </a>
                    </div>
                </div>

                {{-- Cart --}}
                <a href="{{ route('cart.index') }}" class="relative p-2 md:p-2.5 text-gray-600 dark:text-gray-300 hover:text-blue-600 transition-colors focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    @if($cartCount > 0)
                        <span class="absolute top-1 right-1 bg-blue-600 text-white text-[10px] font-bold h-4 w-4 flex items-center justify-center rounded-full border-2 border-white dark:border-gray-950">{{ $cartCount }}</span>
                    @endif
                </a>

                @auth
                    {{-- DROPDOWN PROFIL --}}
                    <div class="relative flex items-center gap-3 pl-2 md:pl-4 border-l border-gray-200 dark:border-gray-800">
                        <button @click="openProfile = !openProfile; openMessages = false" 
                                class="flex items-center gap-3 focus:outline-none group">
                            <span class="hidden lg:block text-sm font-bold text-gray-700 dark:text-gray-200 italic truncate max-w-[100px] group-hover:text-blue-600 transition-colors">
                                {{ Auth::user()->name }}
                            </span>
                            <div class="w-8 h-8 md:w-10 md:h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-md group-hover:ring-2 group-hover:ring-blue-500/50 transition-all uppercase">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </button>

                        <div x-show="openProfile" 
                             @click.away="openProfile = false"
                             x-transition:enter="transition ease-out duration-200"
                             style="display: none;"
                             class="absolute right-0 top-full mt-3 w-52 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-xl z-[150] overflow-hidden">
                            
                            <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                                <p class="text-xs text-gray-500 dark:text-gray-400 mb-0.5">Role: <span class="uppercase font-bold text-blue-600">{{ Auth::user()->usertype }}</span></p>
                                <p class="text-sm font-bold dark:text-white truncate">{{ Auth::user()->email }}</p>
                            </div>

                            {{-- Menu Khusus Admin --}}
                            @if(Auth::user()->usertype === 'admin')
                                <a href="{{ url('/admin') }}" class="flex items-center gap-3 px-4 py-3 text-sm text-blue-600 font-bold hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all border-b border-gray-100 dark:border-gray-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                                    Panel Admin
                                </a>
                            @endif

                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 dark:text-gray-200 hover:bg-blue-600 hover:text-white transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                Edit Profil
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition-all font-bold text-left">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>