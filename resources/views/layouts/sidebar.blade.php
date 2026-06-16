<aside :class="{ 'translate-x-0': mobileSidebarOpen, '-translate-x-full': !mobileSidebarOpen, 'lg:w-[280px]': desktopSidebarExpanded, 'lg:w-[88px]': !desktopSidebarExpanded }" 
       class="absolute left-0 top-0 z-50 flex h-screen flex-col overflow-y-hidden bg-[#064e3b] text-white shadow-[10px_0_20px_rgba(0,0,0,0.1)] transition-all duration-300 ease-in-out lg:static lg:translate-x-0 relative">
    
    <div class="absolute top-0 left-0 w-full h-48 bg-gradient-to-b from-[#115e3b] to-transparent opacity-50 pointer-events-none"></div>

    <div class="flex items-center justify-between gap-2 px-6 py-8 z-10" :class="{ 'lg:justify-center lg:px-0': !desktopSidebarExpanded }">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
            <div class="transform group-hover:scale-105 transition-transform duration-300 flex-shrink-0">
                <img src="{{ asset('images/logo.webp') }}" alt="Logo" class="h-10 w-10 drop-shadow-md">
            </div>
            
            <div class="flex flex-col transition-all duration-300" :class="{ 'lg:hidden': !desktopSidebarExpanded }">
                <span class="text-2xl font-extrabold tracking-tight whitespace-nowrap text-transparent bg-clip-text bg-gradient-to-r from-white to-green-200 leading-none mb-1">
                    E-AGENDA
                </span>
                <span class="text-[9px] font-bold text-green-300/80 uppercase tracking-widest whitespace-nowrap leading-none">
                    Kecamatan Binjai Timur
                </span>
            </div>
        </a>

        <button @click="mobileSidebarOpen = false" class="block lg:hidden text-green-200 hover:text-white bg-white/10 hover:bg-white/20 p-1.5 rounded-lg transition-all">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
    </div>

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear mt-2 z-10 pb-10">
        <nav class="px-4 lg:px-4" :class="{ 'lg:px-3': !desktopSidebarExpanded }">
            
            <h3 class="mb-3 ml-2 text-[10px] font-extrabold text-green-400/80 uppercase tracking-widest transition-all" 
                :class="{ 'lg:hidden': !desktopSidebarExpanded }">Menu Utama</h3>

            <ul class="mb-8 flex flex-col gap-2">
                <li>
                    <a href="{{ route('dashboard') }}" 
                       class="group relative flex items-center gap-3.5 rounded-xl py-3 px-4 font-semibold text-green-50 transition-all duration-300 ease-in-out hover:bg-white/10 hover:shadow-lg {{ request()->routeIs('dashboard') ? 'bg-[#15803d] shadow-[0_4px_15px_-3px_rgba(21,128,61,0.5)] border border-green-500/30' : '' }}"
                       :class="{ 'lg:justify-center lg:px-0': !desktopSidebarExpanded }">
                        <svg class="h-6 w-6 flex-shrink-0 opacity-80 group-hover:opacity-100 group-hover:scale-110 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                        <span class="whitespace-nowrap transition-transform duration-300 group-hover:translate-x-1" :class="{ 'lg:hidden': !desktopSidebarExpanded }">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('surat-masuk.index') }}" 
                       class="group relative flex items-center gap-3.5 rounded-xl py-3 px-4 font-semibold text-green-50 transition-all duration-300 ease-in-out hover:bg-white/10 hover:shadow-lg {{ request()->routeIs('surat-masuk.*') ? 'bg-[#15803d] shadow-[0_4px_15px_-3px_rgba(21,128,61,0.5)] border border-green-500/30' : '' }}"
                       :class="{ 'lg:justify-center lg:px-0': !desktopSidebarExpanded }">
                        <svg class="h-6 w-6 flex-shrink-0 opacity-80 group-hover:opacity-100 group-hover:scale-110 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                        <span class="whitespace-nowrap transition-transform duration-300 group-hover:translate-x-1" :class="{ 'lg:hidden': !desktopSidebarExpanded }">Surat Masuk</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('surat-keluar.index') }}" 
                       class="group relative flex items-center gap-3.5 rounded-xl py-3 px-4 font-semibold text-green-50 transition-all duration-300 ease-in-out hover:bg-white/10 hover:shadow-lg {{ request()->routeIs('surat-keluar.*') ? 'bg-[#15803d] shadow-[0_4px_15px_-3px_rgba(21,128,61,0.5)] border border-green-500/30' : '' }}"
                       :class="{ 'lg:justify-center lg:px-0': !desktopSidebarExpanded }">
                        <svg class="h-6 w-6 flex-shrink-0 opacity-80 group-hover:opacity-100 group-hover:scale-110 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                        <span class="whitespace-nowrap transition-transform duration-300 group-hover:translate-x-1" :class="{ 'lg:hidden': !desktopSidebarExpanded }">Surat Keluar</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('disposisi.index') }}" 
                       class="group relative flex items-center gap-3.5 rounded-xl py-3 px-4 font-semibold text-green-50 transition-all duration-300 ease-in-out hover:bg-white/10 hover:shadow-lg {{ request()->routeIs('disposisi.*') ? 'bg-[#15803d] shadow-[0_4px_15px_-3px_rgba(21,128,61,0.5)] border border-green-500/30' : '' }}"
                       :class="{ 'lg:justify-center lg:px-0': !desktopSidebarExpanded }">
                        <svg class="h-6 w-6 flex-shrink-0 opacity-80 group-hover:opacity-100 group-hover:scale-110 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                        <span class="whitespace-nowrap transition-transform duration-300 group-hover:translate-x-1" :class="{ 'lg:hidden': !desktopSidebarExpanded }">Disposisi</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('klasifikasi.index') }}" 
                       class="group relative flex items-center gap-3.5 rounded-xl py-3 px-4 font-semibold text-green-50 transition-all duration-300 ease-in-out hover:bg-white/10 hover:shadow-lg {{ request()->routeIs('klasifikasi.*') ? 'bg-[#15803d] shadow-[0_4px_15px_-3px_rgba(21,128,61,0.5)] border border-green-500/30' : '' }}"
                       :class="{ 'lg:justify-center lg:px-0': !desktopSidebarExpanded }">
                        <svg class="h-6 w-6 flex-shrink-0 opacity-80 group-hover:opacity-100 group-hover:scale-110 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" /></svg>
                        <span class="whitespace-nowrap transition-transform duration-300 group-hover:translate-x-1" :class="{ 'lg:hidden': !desktopSidebarExpanded }">Klasifikasi</span>
                    </a>
                </li>
            </ul>

            @if(Auth::user()->role === 'admin')
            <div class="pt-4 border-t border-white/10">
                <h3 class="mb-3 ml-2 text-[10px] font-extrabold text-green-400/80 uppercase tracking-widest transition-all" 
                    :class="{ 'lg:hidden': !desktopSidebarExpanded }">Administrator</h3>
                <ul class="mb-6 flex flex-col gap-2">
                    <li>
                        <a href="{{ route('users.index') }}" 
                           class="group relative flex items-center gap-3.5 rounded-xl py-3 px-4 font-semibold text-green-50 transition-all duration-300 ease-in-out hover:bg-white/10 hover:shadow-lg {{ request()->routeIs('users.*') ? 'bg-[#15803d] shadow-[0_4px_15px_-3px_rgba(21,128,61,0.5)] border border-green-500/30' : '' }}"
                           :class="{ 'lg:justify-center lg:px-0': !desktopSidebarExpanded }">
                            <svg class="h-6 w-6 flex-shrink-0 opacity-80 group-hover:opacity-100 group-hover:scale-110 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                            <span class="whitespace-nowrap transition-transform duration-300 group-hover:translate-x-1" :class="{ 'lg:hidden': !desktopSidebarExpanded }">Pengguna</span>
                        </a>
                    </li>
                </ul>
            </div>
            @endif

        </nav>
    </div>
</aside>