<section>
    <header class="mb-6">
        <h3 class="text-lg font-bold text-gray-800">
            Perbarui Password
        </h3>
        <p class="mt-1 text-sm text-gray-500">
            Pastikan akun Anda menggunakan kata sandi yang kuat untuk menjaga keamanan akses.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        <!-- Password Sekarang -->
        <div>
            <label for="update_password_current_password" class="block text-sm font-bold text-gray-700 mb-2">Password Saat Ini</label>
            <input id="update_password_current_password" name="current_password" type="password" 
                   autocomplete="current-password"
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('current_password', 'updatePassword') border-red-500 @enderror">
            @error('current_password', 'updatePassword')
                <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password Baru -->
        <div>
            <label for="update_password_password" class="block text-sm font-bold text-gray-700 mb-2">Password Baru</label>
            <input id="update_password_password" name="password" type="password" 
                   autocomplete="new-password"
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('password', 'updatePassword') border-red-500 @enderror">
            @error('password', 'updatePassword')
                <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Konfirmasi Password -->
        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">Konfirmasi Password Baru</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                   autocomplete="new-password"
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('password_confirmation', 'updatePassword') border-red-500 @enderror">
            @error('password_confirmation', 'updatePassword')
                <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Aksi -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-50">
            <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-[#15803d] px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-[#115e3b] transition-all">
                Perbarui Password
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 3000)"
                   class="text-sm font-bold text-[#15803d]">
                    Password berhasil diperbarui.
                </p>
            @endif
        </div>
    </form>
</section>
