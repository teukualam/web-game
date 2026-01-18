@extends('layouts.app')

@section('content')
<div class="py-8 bg-gray-50 dark:bg-gray-950 min-h-screen transition-colors">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Tombol Kembali ke Dashboard --}}
        <div class="mb-8">
            <a href="{{ route('dashboard') }}" 
               class="inline-flex items-center gap-3 px-5 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:border-blue-500/50 transition-all duration-300 group shadow-sm">
                <i class="fas fa-arrow-left text-sm transition-transform duration-300 group-hover:-translate-x-1"></i>
                <span class="text-sm font-black uppercase italic tracking-tighter">Kembali ke Dashboard</span>
            </a>
        </div>

        {{-- Header Halaman --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl md:text-4xl font-black text-gray-900 dark:text-white uppercase italic tracking-tighter">
                    Kotak <span class="text-blue-600">Pesan</span>
                </h1>
                <p class="text-gray-500 dark:text-gray-400 text-sm mt-1 font-medium">
                    Dapatkan informasi akun dan CD-Key hasil pembelian Anda di sini.
                </p>
            </div>
            <div class="bg-blue-600/10 text-blue-600 px-4 py-2 rounded-xl text-xs font-black border border-blue-600/20 uppercase italic tracking-widest shrink-0">
                Total {{ $messages->count() }} Pesan
            </div>
        </div>

        <div class="space-y-4">
            @forelse($messages as $message)
                {{-- Kartu Pesan --}}
                <div class="bg-white dark:bg-gray-900 border {{ $message->is_read ? 'border-gray-200 dark:border-gray-800' : 'border-blue-500 shadow-lg shadow-blue-500/10' }} rounded-[2rem] p-6 transition-all group relative">
                    
                    @if(!$message->is_read)
                        <span class="absolute -top-2 -left-2 flex h-5 w-5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-5 w-5 bg-blue-600 border-2 border-white dark:border-gray-950"></span>
                        </span>
                    @endif

                    <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
                        <div class="flex items-start gap-4">
                            <div class="{{ $message->is_read ? 'bg-gray-100 dark:bg-gray-800 text-gray-500' : 'bg-blue-600 text-white shadow-lg shadow-blue-500/30' }} p-4 rounded-2xl transition-all">
                                <i class="fas fa-key text-xl"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-blue-600 uppercase tracking-widest mb-1 italic">
                                    {{ $message->sender_name ?? 'Admin Fazynsyy Store' }} • Pesanan #{{ $message->order_id ?? $message->id }}
                                </p>
                                <h2 class="text-lg font-black text-gray-900 dark:text-white mb-2 uppercase italic tracking-tighter">
                                    {{ $message->subject }}
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed font-medium">
                                    {{ $message->body ?? $message->content }}
                                </p>
                            </div>
                        </div>
                        <div class="text-right shrink-0">
                            <span class="text-[11px] font-bold uppercase tracking-tighter text-gray-400 italic">
                                {{ $message->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>

                    {{-- Section CD-Key --}}
                    @if($message->cd_key)
                        <div class="mt-6 flex flex-col sm:flex-row items-center gap-3">
                            <div class="w-full bg-gray-50 dark:bg-gray-800/50 border-2 border-dashed border-gray-200 dark:border-gray-700 rounded-[1.5rem] p-4 flex justify-between items-center group-hover:border-blue-500/50 transition-colors">
                                <code class="cd-key-value text-blue-600 dark:text-blue-400 font-mono font-black text-lg tracking-widest">{{ $message->cd_key }}</code>
                                <button onclick="copyKey(this)" class="copy-btn bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-xs font-black uppercase italic tracking-tighter transition-all transform active:scale-95 flex items-center gap-2 shadow-md shadow-blue-500/20">
                                    <i class="fas fa-copy"></i>
                                    <span>Salin Key</span>
                                </button>
                            </div>
                            <a href="#" class="w-full sm:w-auto text-center px-6 py-4 text-xs font-black uppercase italic tracking-tighter text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-all border border-transparent hover:border-blue-500/20 rounded-2xl">
                                Panduan Aktivasi
                            </a>
                        </div>
                    @else
                        {{-- Jika Key Habis --}}
                        <div class="mt-4 p-4 rounded-2xl bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800/50 flex items-center gap-3">
                            <i class="fas fa-exclamation-triangle text-amber-600"></i>
                            <p class="text-xs font-bold italic uppercase tracking-tighter text-amber-700 dark:text-amber-400">
                                Stok key otomatis habis. Hubungi Admin via WhatsApp untuk klaim manual.
                            </p>
                        </div>
                    @endif
                </div>
            @empty
                {{-- Tampilan Kosong (Empty State) --}}
                <div class="text-center py-24 bg-white dark:bg-gray-900 rounded-[3rem] border border-gray-100 dark:border-gray-800 shadow-sm">
                    <div class="bg-gray-50 dark:bg-gray-800 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                        <i class="fas fa-envelope-open text-4xl text-gray-300"></i>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 dark:text-white uppercase italic tracking-tighter">Belum ada pesan</h3>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-2 max-w-xs mx-auto font-medium">
                        Pesan berisi informasi produk akan muncul di sini setelah transaksi sukses.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<script>
    function copyKey(button) {
        const keyElement = button.closest('div').querySelector('.cd-key-value');
        const originalText = button.innerHTML;
        
        navigator.clipboard.writeText(keyElement.innerText.trim()).then(() => {
            button.innerHTML = '<i class="fas fa-check"></i> <span>Tersalin</span>';
            button.classList.replace('bg-blue-600', 'bg-green-600');
            
            setTimeout(() => {
                button.innerHTML = originalText;
                button.classList.replace('bg-green-600', 'bg-blue-600');
            }, 2000);
        });
    }
</script>
@endsection