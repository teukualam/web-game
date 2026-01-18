<x-app-layout>
    <div class="py-6 md:py-10 bg-gray-50 dark:bg-gray-950 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- SLIDER --}}
            <div x-data="{ active: 0, slides: [
                {img: '{{ asset('assets/Fazynsyy.png') }}', title: ''},
                {img: '{{ asset('assets/Cover.png') }}', title: ''}
            ], init() { setInterval(() => { this.active = (this.active + 1) % this.slides.length }, 5000) }}" 
            class="relative h-48 md:h-96 rounded-3xl overflow-hidden shadow-2xl mb-12 z-0">
                <template x-for="(slide, index) in slides" :key="index">
                    <div x-show="active === index" 
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 scale-105"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="absolute inset-0">
                        <img :src="slide.img" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6 md:p-10">
                            <h2 class="text-2xl md:text-6xl font-black text-white italic tracking-tighter uppercase" x-text="slide.title"></h2>
                        </div>
                    </div>
                </template>
            </div>

            {{-- DAFTAR GAME --}}
            <div class="relative z-10">
                <div class="flex justify-between items-end mb-8">
                    <div>
                        <h2 class="text-xl md:text-2xl font-black text-gray-900 dark:text-white uppercase tracking-tighter">Kategori Pilihan</h2>
                        <div class="h-1.5 w-16 bg-blue-600 rounded-full mt-1"></div>
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 md:gap-6">
                    @foreach($games as $game_item)
                        <div class="group relative flex flex-col bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:border-blue-500">
                            
                            {{-- Image Container --}}
                            <div class="aspect-[3/4] w-full overflow-hidden bg-gray-200 dark:bg-gray-800">
                                @if($game_item->cover_image)
                                    {{-- Coba ganti bagian <img> King dengan ini --}}
<img src="{{ asset($game_item->cover_image) }}" 
     alt="{{ $game_item->name }}"
     class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs italic">No Image</div>
                                @endif
                            </div>

                            {{-- Info --}}
                            <div class="p-3 md:p-4 flex flex-col flex-grow">
                                <h3 class="text-xs md:text-sm font-bold text-gray-800 dark:text-gray-100 line-clamp-2 mb-2 md:mb-3 group-hover:text-blue-600 transition-colors uppercase">
                                    {{ $game_item->name }}
                                </h3>
                                <div class="mt-auto">
                                    <span class="text-blue-600 dark:text-blue-400 font-black text-base md:text-lg italic">
                                        Rp {{ number_format($game_item->price, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>

                            {{-- Overlay Link --}}
                            <a href="{{ route('game.show', $game_item->id) }}" class="absolute inset-0 z-30" aria-label="Lihat {{ $game_item->name }}"></a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>