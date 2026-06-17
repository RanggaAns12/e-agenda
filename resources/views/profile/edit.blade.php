<x-app-layout>
    <div class="animate-fade-in-up space-y-6">
        <!-- Header Halaman -->
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800 tracking-tight">Profil Saya</h2>
                <p class="text-sm text-gray-500 mt-1">Kelola informasi pribadi dan tingkatkan keamanan akun Anda.</p>
            </div>
        </div>

        <!-- Grid Panel Profil & Password -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <!-- Panel Kiri: Informasi Profil -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Panel Kanan: Ganti Password -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                @include('profile.partials.update-password-form')
            </div>

        </div>
    </div>
</x-app-layout>
