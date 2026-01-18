<x-app-layout>
    
    <div class="relative bg-gradient-to-br from-rose-700 via-red-600 to-orange-600 py-12 overflow-hidden">
        <div class="absolute inset-0 opacity-20" 
             style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 24px 24px;">
        </div>
        
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-yellow-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-64 h-64 bg-red-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                
                <div class="flex items-center gap-5 text-center md:text-left">
                    <div class="hidden md:flex p-4 bg-white/10 rounded-2xl backdrop-blur-md border border-white/20 shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-yellow-300 drop-shadow-lg">
                            <path fill-rule="evenodd" d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.75a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .913-.143Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-4xl md:text-6xl font-black text-white italic tracking-tighter drop-shadow-sm">
                            FLASH <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-200 to-yellow-400">DEALS</span>
                        </h1>
                        <p class="text-red-100 text-sm md:text-lg font-medium mt-1 flex items-center justify-center md:justify-start gap-2">
                            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                            Penawaran terbatas, harga termurah!
                        </p>
                    </div>
                </div>

                <div x-data="timer()" x-init="start()" class="bg-black/20 backdrop-blur-md rounded-3xl p-1 border border-white/10 shadow-xl">
                    <div class="flex items-center px-6 py-3 rounded-2xl bg-gradient-to-b from-white/10 to-transparent">
                        <div class="text-center mr-4 border-r border-white/20 pr-4">
                            <span class="block text-[10px] uppercase tracking-wider text-red-200 font-bold">Berakhir</span>
                            <span class="block text-[10px] uppercase tracking-wider text-red-200 font-bold">Dalam</span>
                        </div>
                        <div class="flex gap-2 text-white font-mono font-bold text-3xl md:text-4xl tabular-nums tracking-tight shadow-black/50">
                            <div class="flex flex-col items-center">
                                <span x-text="hours">02</span>
                                <span class="text-[9px] font-sans font-normal opacity-60">JAM</span>
                            </div>
                            <span class="text-yellow-400 animate-pulse -mt-3">:</span>
                            <div class="flex flex-col items-center">
                                <span x-text="minutes">15</span>
                                <span class="text-[9px] font-sans font-normal opacity-60">MNT</span>
                            </div>
                            <span class="text-yellow-400 animate-pulse -mt-3">:</span>
                            <div class="flex flex-col items-center">
                                <span class="bg-red-600 px-2 rounded-lg shadow-inner text-white" x-text="seconds">30</span>
                                <span class="text-[9px] font-sans font-normal opacity-60">DTK</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 min-h-screen pb-20">
        <div class="sticky top-0 z-40 bg-white shadow-sm border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex gap-2 overflow-x-auto py-4 no-scrollbar items-center md:justify-center">
                    <button class="flex-shrink-0 bg-red-600 text-white px-8 py-2.5 rounded-full font-bold text-sm shadow-lg shadow-red-500/30 transition-transform transform active:scale-95 flex flex-col items-center min-w-[140px]">
                        <span>14:00</span>
                        <span class="text-[10px] font-normal opacity-90">Sedang Berjalan</span>
                    </button>
                    
                    <button class="flex-shrink-0 bg-white text-gray-400 px-8 py-2.5 rounded-full font-bold text-sm border border-gray-200 hover:border-red-200 hover:text-red-500 transition-colors flex flex-col items-center min-w-[140px]">
                        <span>18:00</span>
                        <span class="text-[10px] font-normal opacity-70">Akan Datang</span>
                    </button>
                    
                    <button class="flex-shrink-0 bg-white text-gray-400 px-8 py-2.5 rounded-full font-bold text-sm border border-gray-200 hover:border-red-200 hover:text-red-500 transition-colors flex flex-col items-center min-w-[140px]">
                        <span>21:00</span>
                        <span class="text-[10px] font-normal opacity-70">Akan Datang</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 md:gap-6">
                @foreach($games as $game)
                    <div class="group relative bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                        
                        <div class="relative w-full aspect-[3/4] overflow-hidden bg-gray-100">
                            <img src="{{ asset('storage/' . $game->cover_image) }}" 
                                 alt="{{ $game->name }}"
                                 class="w-full h-full object-cover transition duration-700 group-hover:scale-110"
                                 loading="lazy">
                            
                            <div class="absolute top-0 right-0 bg-yellow-400 text-red-900 text-xs font-black px-3 py-1.5 rounded-bl-xl shadow-sm z-10">
                                Diskon
                            </div>

                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>

                            <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 z-20">
                                <span class="block w-full bg-white text-red-600 text-center py-2 rounded-xl font-bold text-xs shadow-lg">
                                    Beli Sekarang
                                </span>
                            </div>
                        </div>

                        <div class="p-4">
                            <h3 class="text-sm text-gray-800 font-semibold line-clamp-2 mb-2 h-10 leading-snug group-hover:text-red-600 transition-colors">
                                {{ $game->name }}
                            </h3>

                            <div class="mb-3">
                                <p class="text-xs text-gray-400 line-through decoration-red-400/50 mb-0.5">
                                    Rp {{ number_format($game->price * 2, 0, ',', '.') }}
                                </p>
                                <div class="flex items-center gap-1 text-red-600">
                                    <span class="text-xs font-bold self-start mt-1">Rp</span>
                                    <span class="text-xl font-black tracking-tight">{{ number_format($game->price, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <div class="space-y-1.5">
                                <div class="flex justify-between items-end text-[10px] font-bold uppercase tracking-wide">
                                    <span class="text-orange-500 flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 animate-pulse">
                                            <path fill-rule="evenodd" d="M12.963 2.286a.75.75 0 0 0-1.071-.136 9.742 9.742 0 0 0-3.539 6.177 7.547 7.547 0 0 1-1.705-1.715.75.75 0 0 0-1.152.082A9 9 0 1 0 15.68 4.534a7.46 7.46 0 0 1-2.717-2.248ZM15.75 14.25a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                        </svg>
                                        Segera Habis
                                    </span>
                                    <span class="text-gray-400">85%</span>
                                </div>
                                <div class="relative w-full h-2.5 bg-gray-100 rounded-full overflow-hidden ring-1 ring-black/5">
                                    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-red-500 to-orange-400 rounded-full animate-shimmer" style="width: 85%; background-size: 200% 100%;"></div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('game.show', $game) }}" class="absolute inset-0 z-30" aria-label="Lihat {{ $game->name }}"></a>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-12 text-center text-gray-400 text-sm">
                <p>Menampilkan Flash Sale untuk periode ini.</p>
            </div>
        </div>
    </div>

    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        @keyframes shimmer {
            0% { background-position: 100% 0; }
            100% { background-position: -100% 0; }
        }
        .animate-shimmer {
            animation: shimmer 2s infinite linear;
        }
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>

    <script>
        function timer() {
            return {
                hours: '02',
                minutes: '15',
                seconds: '00',
                remaining: 8100,
                interval: null,
                start() {
                    this.interval = setInterval(() => {
                        if (this.remaining > 0) {
                            this.remaining--;
                            this.updateDisplay();
                        } else {
                            clearInterval(this.interval);
                        }
                    }, 1000);
                },
                updateDisplay() {
                    let h = Math.floor(this.remaining / 3600);
                    let m = Math.floor((this.remaining % 3600) / 60);
                    let s = this.remaining % 60;
                    
                    this.hours = h.toString().padStart(2, '0');
                    this.minutes = m.toString().padStart(2, '0');
                    this.seconds = s.toString().padStart(2, '0');
                }
            }
        }
    </script>
</x-app-layout>