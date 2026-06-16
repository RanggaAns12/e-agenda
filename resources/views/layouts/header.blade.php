<header class="sticky top-0 z-30 flex w-full bg-white/80 backdrop-blur-md drop-shadow-[0_4px_15px_rgba(0,0,0,0.03)] transition-all duration-300">
    <div class="flex w-full items-center justify-between px-4 py-3 shadow-2 md:px-6 2xl:px-11">
        
        <div class="flex items-center gap-2 sm:gap-4">
            <!-- Trigger Sidebar Mobile -->
            <button @click.stop="mobileSidebarOpen = !mobileSidebarOpen" 
                    class="block lg:hidden rounded-xl bg-white p-2.5 shadow-sm border border-gray-100 text-gray-500 hover:text-[#15803d] hover:shadow-md transition-all">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
            </button>
            
            <!-- Trigger Sidebar Desktop -->
            <button @click.stop="desktopSidebarExpanded = !desktopSidebarExpanded" 
                    class="hidden lg:flex items-center justify-center rounded-xl bg-gray-50 p-2.5 shadow-sm border border-gray-100 text-gray-500 hover:bg-[#15803d] hover:text-white transition-all duration-300">
                <svg class="h-6 w-6 transform transition-transform duration-300" :class="!desktopSidebarExpanded ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Logo dan Teks E-Agenda di Mobile -->
            <a href="{{ route('dashboard') }}" class="flex lg:hidden items-center gap-2 ml-1">
                <img src="{{ asset('images/logo.webp') }}" alt="Logo" class="h-7 w-7 drop-shadow-sm flex-shrink-0">
                <span class="text-base font-extrabold tracking-tight text-gray-800 leading-none">
                    E-Agenda
                </span>
            </a>
        </div>

        <div class="hidden sm:flex flex-col items-center justify-center group">
            <span id="dynamic-greeting" class="text-[11px] font-bold text-gray-400 uppercase tracking-widest group-hover:text-[#15803d] transition-colors">
                Memuat waktu...
            </span>
            <div class="flex items-center gap-2 mt-0.5">
                <svg class="w-4 h-4 text-[#115e3b] animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span id="realtime-clock" class="text-lg font-extrabold text-[#064e3b] tracking-tight">00:00:00</span>
                <span class="text-xs font-semibold text-gray-500">WIB</span>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                <a class="flex items-center gap-3 cursor-pointer rounded-full bg-white p-1 pr-4 border border-gray-100 hover:shadow-md transition-all duration-300 group" href="#" @click.prevent="dropdownOpen = !dropdownOpen">
                    <span class="h-9 w-9 rounded-full bg-gradient-to-br from-[#115e3b] to-[#15803d] flex items-center justify-center shadow-inner group-hover:scale-105 transition-transform duration-300">
                        <span class="text-sm font-bold text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </span>
                    <span class="hidden text-right lg:block">
                        <span class="block text-sm font-bold text-gray-800">{{ Auth::user()->name }}</span>
                        <span class="block text-[10px] font-bold text-[#15803d] uppercase tracking-wider">{{ Auth::user()->role }}</span>
                    </span>
                    <svg class="hidden sm:block h-4 w-4 text-gray-400 transition-transform duration-300" :class="dropdownOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </a>

                <div x-show="dropdownOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95 translate-y-2" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-95 translate-y-2" class="absolute right-0 mt-3 flex w-56 flex-col rounded-2xl border border-gray-100 bg-white shadow-xl overflow-hidden" style="display: none;">
                    <div class="px-4 py-3 border-b border-gray-50 bg-gray-50/50">
                        <p class="text-xs text-gray-500">Masuk sebagai</p>
                        <p class="text-sm font-bold text-gray-800 truncate">{{ Auth::user()->username }}</p>
                    </div>
                    <ul class="flex flex-col gap-1 px-2 py-2 border-b border-gray-50">
                        <li>
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 text-sm font-medium text-gray-600 duration-200 hover:text-[#15803d] p-2.5 rounded-xl hover:bg-green-50 group">
                                <svg class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                Profil Saya
                            </a>
                        </li>
                    </ul>
                    <form method="POST" action="{{ route('logout') }}" class="px-2 py-2">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 text-sm font-medium text-red-600 duration-200 hover:text-red-700 w-full text-left p-2.5 rounded-xl hover:bg-red-50 group">
                            <svg class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                            Keluar Sistem
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    function updateClock() {
        const now = new Date();
        
        // Atur waktu mengikuti Jakarta (WIB)
        const options = { timeZone: 'Asia/Jakarta', hour12: false, hour: '2-digit', minute: '2-digit', second: '2-digit' };
        const timeString = now.toLocaleTimeString('id-ID', options);
        
        // Format jam menjadi HH:MM:SS
        document.getElementById('realtime-clock').innerText = timeString.replace(/\./g, ':');

        // Mengambil jam saja untuk logika ucapan (0-23)
        const currentHour = parseInt(now.toLocaleTimeString('id-ID', { timeZone: 'Asia/Jakarta', hour: '2-digit', hour12: false }));
        
        let greeting = 'Selamat Malam';
        if (currentHour >= 4 && currentHour < 11) {
            greeting = 'Selamat Pagi';
        } else if (currentHour >= 11 && currentHour < 15) {
            greeting = 'Selamat Siang';
        } else if (currentHour >= 15 && currentHour < 18) {
            greeting = 'Selamat Sore';
        } else {
            greeting = 'Selamat Malam';
        }

        // Memasukkan nama User yang login
        document.getElementById('dynamic-greeting').innerText = greeting + ', {{ explode(" ", Auth::user()->name)[0] }}';
    }

    // Jalankan detik pertama, lalu update setiap 1000ms (1 detik)
    updateClock();
    setInterval(updateClock, 1000);
</script>

<style>
    .animate-spin-slow { animation: spin 4s linear infinite; }
</style>