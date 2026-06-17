<section>
    <header class="mb-6">
        <h3 class="text-lg font-bold text-gray-800">
            Informasi Profil
        </h3>
        <p class="mt-1 text-sm text-gray-500">
            Perbarui nama lengkap dan nama pengguna (username) akun Anda.
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        <!-- Nama Lengkap -->
        <div>
            <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
            <input id="name" name="name" type="text" 
                   value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Username -->
        <div>
            <label for="username" class="block text-sm font-bold text-gray-700 mb-2">Username</label>
            <input id="username" name="username" type="text" 
                   value="{{ old('username', $user->username) }}" required autocomplete="username"
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('username') border-red-500 @enderror">
            @error('username')
                <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Role (Read Only) -->
        <div>
            <label class="block text-sm font-bold text-gray-400 mb-2">Role / Hak Akses (Tidak dapat diubah)</label>
            <input type="text" value="{{ $user->role === 'admin' ? 'Administrator' : 'Petugas Agenda' }}" disabled
                   class="w-full px-4 py-3 rounded-xl border border-gray-150 bg-gray-50 text-gray-400 font-semibold cursor-not-allowed">
        </div>

        <!-- Tombol Aksi -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-50">
            <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-[#15803d] px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-[#115e3b] transition-all">
                Simpan Perubahan
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 3000)"
                   class="text-sm font-bold text-[#15803d]">
                    Berhasil disimpan.
                </p>
            @endif
        </div>
    </form>
</section>
