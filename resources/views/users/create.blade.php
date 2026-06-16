<x-app-layout>
    <div class="animate-fade-in-up space-y-6">
        
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800 tracking-tight">Tambah Pengguna</h2>
                <p class="text-sm text-gray-500 mt-1">Buat akun petugas atau administrator baru.</p>
            </div>
            
            <a href="{{ route('users.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-bold text-gray-700 shadow-sm hover:bg-gray-50 transition-all">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
            <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Lengkap -->
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('name') border-red-500 @enderror" 
                               placeholder="Contoh: Ahmad Subardjo">
                        @error('name')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-sm font-bold text-gray-700 mb-2">Username <span class="text-red-500">*</span></label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('username') border-red-500 @enderror" 
                               placeholder="Contoh: ahmad_subardjo">
                        @error('username')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div>
                        <label for="role" class="block text-sm font-bold text-gray-700 mb-2">Role / Hak Akses <span class="text-red-500">*</span></label>
                        <select name="role" id="role" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('role') border-red-500 @enderror">
                            <option value="">-- Pilih Role --</option>
                            <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas Agenda</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                        </select>
                        @error('role')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-50">
                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password" id="password" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('password') border-red-500 @enderror" 
                               placeholder="Minimal 8 karakter">
                        @error('password')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">Konfirmasi Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" 
                               placeholder="Ulangi password">
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                    <button type="reset" class="px-5 py-2.5 text-sm font-bold text-gray-500 hover:text-gray-700 transition-colors">
                        Reset Form
                    </button>
                    <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-[#15803d] px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-[#115e3b] transition-all">
                        Simpan Pengguna
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
