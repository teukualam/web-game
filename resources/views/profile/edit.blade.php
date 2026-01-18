<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-black text-2xl text-gray-800 leading-tight flex items-center gap-3">
                <div class="p-2 bg-orange-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-orange-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
                {{ __('Pengaturan Akun') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden relative group">
                        <div class="h-32 bg-gradient-to-r from-orange-400 to-red-600 relative overflow-hidden">
                            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-20"></div>
                            <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-white/20 rounded-full blur-2xl"></div>
                        </div>

                        <div class="px-6 pb-8 text-center relative">
                            <div class="relative inline-block -mt-12 mb-4">
                                <div class="w-24 h-24 bg-white p-1 rounded-full shadow-lg">
                                    <div class="w-full h-full bg-gray-800 text-white rounded-full flex items-center justify-center font-black text-3xl uppercase tracking-wider">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                </div>
                                <div class="absolute bottom-1 right-1 w-6 h-6 bg-green-500 border-4 border-white rounded-full" title="Online"></div>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900">{{ $user->name }}</h3>
                            <p class="text-sm text-gray-500 mb-6">{{ $user->email }}</p>

                            <div class="grid grid-cols-2 gap-4 border-t border-gray-100 pt-6">
                                <div>
                                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Status</span>
                                    <span class="block text-sm font-bold text-green-600 bg-green-50 px-2 py-1 rounded-full inline-block mt-1">Verified</span>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Bergabung</span>
                                    <span class="block text-sm font-bold text-gray-700 mt-1">{{ $user->created_at->format('M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl p-6 text-white shadow-lg relative overflow-hidden hidden lg:block">
                        <svg class="absolute bottom-0 right-0 w-32 h-32 text-white/5 -mb-8 -mr-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zm0 9l2.5-1.25L12 8.5l-2.5 1.25L12 11zm0 2.5l-5-2.5-5 2.5L12 22l10-8.5-5-2.5-5 2.5z"/></svg>
                        <h4 class="font-bold text-lg mb-2">Keamanan Akun</h4>
                        <p class="text-gray-300 text-sm leading-relaxed">
                            Ganti password secara berkala untuk menjaga keamanan akun Anda dari akses yang tidak sah.
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-8">
                    
                    <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-gray-100">
                        <header class="flex items-start justify-between border-b border-gray-100 pb-6 mb-6">
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Informasi Pribadi</h2>
                                <p class="mt-1 text-sm text-gray-500">Perbarui informasi profil dan alamat email Anda.</p>
                            </div>
                            <div class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </div>
                        </header>

                        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                            @csrf
                            @method('patch')

                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus 
                                        class="w-full bg-gray-50 text-gray-900 text-sm border-0 rounded-xl px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:bg-white transition-all placeholder-gray-400"
                                        placeholder="Masukkan nama lengkap">
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Alamat Email</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required 
                                        class="w-full bg-gray-50 text-gray-900 text-sm border-0 rounded-xl px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:bg-white transition-all placeholder-gray-400"
                                        placeholder="nama@email.com">
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                </div>
                            </div>

                            <div class="flex items-center gap-4 pt-4">
                                <button type="submit" class="bg-gray-900 hover:bg-black text-white px-6 py-2.5 rounded-xl font-bold text-sm shadow-lg shadow-gray-500/30 transition-all hover:scale-105 active:scale-95">
                                    Simpan Perubahan
                                </button>

                                @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition class="text-sm text-green-600 font-medium flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                                        Berhasil disimpan.
                                    </p>
                                @endif
                            </div>
                        </form>
                    </div>

                    <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-gray-100">
                        <header class="flex items-start justify-between border-b border-gray-100 pb-6 mb-6">
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Ganti Password</h2>
                                <p class="mt-1 text-sm text-gray-500">Pastikan akun tetap aman dengan password yang kuat.</p>
                            </div>
                            <div class="p-2 bg-orange-50 text-orange-600 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </div>
                        </header>

                        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Password Saat Ini</label>
                                <div class="relative">
                                    <input type="password" name="current_password" autocomplete="current-password" 
                                        class="w-full bg-gray-50 text-gray-900 text-sm border-0 rounded-xl px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:bg-white transition-all"
                                        placeholder="••••••••">
                                </div>
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Password Baru</label>
                                    <input type="password" name="password" autocomplete="new-password" 
                                        class="w-full bg-gray-50 text-gray-900 text-sm border-0 rounded-xl px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:bg-white transition-all"
                                        placeholder="Minimal 8 karakter">
                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" autocomplete="new-password" 
                                        class="w-full bg-gray-50 text-gray-900 text-sm border-0 rounded-xl px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:bg-white transition-all"
                                        placeholder="Ulangi password baru">
                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>

                            <div class="flex items-center gap-4 pt-4">
                                <button type="submit" class="bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-600 hover:to-red-700 text-white px-6 py-2.5 rounded-xl font-bold text-sm shadow-lg shadow-orange-500/30 transition-all hover:scale-105 active:scale-95">
                                    Update Password
                                </button>

                                @if (session('status') === 'password-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition class="text-sm text-green-600 font-medium flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                                        Berhasil disimpan.
                                    </p>
                                @endif
                            </div>
                        </form>
                    </div>

                    <div class="bg-red-50/50 rounded-3xl p-6 sm:p-8 border border-red-100 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                        <div>
                            <h2 class="text-lg font-bold text-red-700 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                </svg>
                                Zona Bahaya
                            </h2>
                            <p class="mt-1 text-sm text-red-600/80 max-w-lg">
                                Menghapus akun bersifat permanen. Semua data game dan riwayat transaksi akan hilang.
                            </p>
                        </div>

                        <div x-data="{ open: false }">
                            <button @click="open = true" class="whitespace-nowrap bg-white border border-red-200 text-red-600 hover:bg-red-600 hover:text-white px-5 py-2.5 rounded-xl font-bold text-sm transition-colors shadow-sm">
                                Hapus Akun Saya
                            </button>

                            <div x-show="open" 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0"
                                 x-transition:enter-end="opacity-100"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900/60 backdrop-blur-sm p-4" 
                                 style="display: none;">
                                
                                <div @click.away="open = false" class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 transform transition-all">
                                    <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-red-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                        </svg>
                                    </div>
                                    
                                    <h2 class="text-xl font-bold text-gray-900 text-center">Yakin ingin menghapus?</h2>
                                    <p class="mt-2 text-sm text-gray-500 text-center">
                                        Tindakan ini tidak dapat dibatalkan. Masukkan password Anda untuk konfirmasi.
                                    </p>

                                    <form method="post" action="{{ route('profile.destroy') }}" class="mt-6">
                                        @csrf
                                        @method('delete')

                                        <div>
                                            <input type="password" name="password" placeholder="Password Anda" class="w-full bg-gray-50 border-0 rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-500 text-sm">
                                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                        </div>

                                        <div class="mt-6 flex justify-end gap-3 border-t border-gray-100 pt-4">
                                            <button type="button" @click="open = false" class="px-5 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl font-bold text-sm hover:bg-gray-50">
                                                Batal
                                            </button>
                                            <button type="submit" class="px-5 py-2.5 bg-red-600 text-white rounded-xl font-bold text-sm hover:bg-red-700 shadow-lg shadow-red-500/30">
                                                Hapus Permanen
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>