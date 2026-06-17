<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'E-Agenda') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#f3f4f6] text-gray-800 overflow-hidden">

    <div x-data="{ mobileSidebarOpen: false, desktopSidebarExpanded: true }" class="flex h-screen w-full">
        
        <div x-show="mobileSidebarOpen" 
             @click="mobileSidebarOpen = false" 
             x-transition.opacity.duration.300ms 
             class="fixed inset-0 z-40 bg-black/60 backdrop-blur-sm lg:hidden">
        </div>

        @include('layouts.sidebar')

        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden transition-all duration-300 ease-in-out">
            
            @include('layouts.header')

            <main class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10 pb-24 lg:pb-10 w-full">
                
                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" x-transition.duration.500ms 
                         class="mb-6 flex w-full items-center justify-between border-l-4 border-[#15803d] bg-white px-6 py-4 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.1)] rounded-r-2xl transform hover:scale-[1.01] transition-transform">
                        <div class="flex items-center gap-4">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100 text-[#15803d]">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            </div>
                            <div>
                                <h5 class="text-base font-bold text-gray-800">Berhasil!</h5>
                                <p class="text-sm text-gray-500">{{ session('success') }}</p>
                            </div>
                        </div>
                        <button @click="show = false" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>

        <!-- Mobile Bottom Navigation Bar (Android Style) -->
        <div class="fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-gray-150 shadow-[0_-4px_20px_rgba(0,0,0,0.06)] lg:hidden px-2 py-2.5 pb-safe">
            <div class="flex items-center justify-around">
                <!-- Beranda -->
                <a href="{{ route('dashboard') }}" 
                   class="flex flex-col items-center justify-center flex-1 py-1 transition-all duration-200 {{ request()->routeIs('dashboard') ? 'text-[#15803d]' : 'text-gray-400 hover:text-gray-700' }}">
                    <svg class="h-6 w-6 transition-transform {{ request()->routeIs('dashboard') ? 'scale-105 stroke-[2.5px]' : 'stroke-2' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="text-[9px] font-extrabold mt-1 tracking-tight">Beranda</span>
                </a>

                <!-- Surat Masuk -->
                <a href="{{ route('surat-masuk.index') }}" 
                   class="flex flex-col items-center justify-center flex-1 py-1 transition-all duration-200 {{ request()->routeIs('surat-masuk.*') ? 'text-[#15803d]' : 'text-gray-400 hover:text-gray-700' }}">
                    <svg class="h-6 w-6 transition-transform {{ request()->routeIs('surat-masuk.*') ? 'scale-105 stroke-[2.5px]' : 'stroke-2' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <span class="text-[9px] font-extrabold mt-1 tracking-tight">Surat Masuk</span>
                </a>

                <!-- Surat Keluar -->
                <a href="{{ route('surat-keluar.index') }}" 
                   class="flex flex-col items-center justify-center flex-1 py-1 transition-all duration-200 {{ request()->routeIs('surat-keluar.*') ? 'text-[#15803d]' : 'text-gray-400 hover:text-gray-700' }}">
                    <svg class="h-6 w-6 transition-transform {{ request()->routeIs('surat-keluar.*') ? 'scale-105 stroke-[2.5px]' : 'stroke-2' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                    <span class="text-[9px] font-extrabold mt-1 tracking-tight">Surat Keluar</span>
                </a>

                <!-- Disposisi -->
                <a href="{{ route('disposisi.index') }}" 
                   class="flex flex-col items-center justify-center flex-1 py-1 transition-all duration-200 {{ request()->routeIs('disposisi.*') ? 'text-[#15803d]' : 'text-gray-400 hover:text-gray-700' }}">
                    <svg class="h-6 w-6 transition-transform {{ request()->routeIs('disposisi.*') ? 'scale-105 stroke-[2.5px]' : 'stroke-2' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    <span class="text-[9px] font-extrabold mt-1 tracking-tight">Disposisi</span>
                </a>

                <!-- Menu Sidebar Trigger -->
                <button @click.stop="mobileSidebarOpen = !mobileSidebarOpen" 
                        class="flex flex-col items-center justify-center flex-1 py-1 text-gray-400 hover:text-gray-700 transition-all duration-200">
                    <svg class="h-6 w-6 stroke-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <span class="text-[9px] font-extrabold mt-1 tracking-tight">Menu</span>
                </button>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.4s ease-out forwards;
        }
    </style>

    <!-- Script Dynamic AJAX SPA Loader untuk Bottom Nav Mobile (Tanpa Reload Halaman) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bottomNav = document.querySelector('.fixed.bottom-0');
            if (!bottomNav) return;

            const mainContainer = document.querySelector('main');
            if (!mainContainer) return;

            // Container pembungkus utama untuk scroll
            const scrollWrapper = mainContainer.closest('.overflow-y-auto') || window;

            // Cache data halaman untuk performa super instan
            const pageCache = {};

            async function loadPage(url, pushToHistory = true) {
                // Tampilkan loading transition (fade-out tipis)
                mainContainer.style.opacity = '0.35';
                mainContainer.style.transition = 'opacity 0.15s ease-in-out';

                try {
                    let htmlText = '';
                    if (pageCache[url]) {
                        htmlText = pageCache[url];
                    } else {
                        const response = await fetch(url);
                        if (!response.ok) throw new Error('Response error');
                        htmlText = await response.text();
                        pageCache[url] = htmlText; // simpan di cache
                    }

                    const parser = new DOMParser();
                    const doc = parser.parseFromString(htmlText, 'text/html');

                    const newMain = doc.querySelector('main');
                    if (newMain) {
                        mainContainer.innerHTML = newMain.innerHTML;
                        
                        // Jalankan ulang script bawaan di dalam main
                        executeScripts(mainContainer);

                        // Re-inisialisasi Alpine.js agar event-handler, modal, dll terikat kembali
                        if (window.Alpine) {
                            window.Alpine.initTree(mainContainer);
                        }
                    }

                    if (doc.title) {
                        document.title = doc.title;
                    }

                    if (pushToHistory) {
                        window.history.pushState({ url: url }, '', url);
                    }

                    // Perbarui tab mana yang aktif secara visual di bottom navigation
                    updateActiveNav(url);

                    // Scroll kembali ke atas
                    if (scrollWrapper === window) {
                        window.scrollTo(0, 0);
                    } else {
                        scrollWrapper.scrollTop = 0;
                    }

                } catch (error) {
                    console.error('AJAX loading failed, falling back to full reload:', error);
                    window.location.href = url;
                } finally {
                    mainContainer.style.opacity = '1';
                }
            }

            function executeScripts(container) {
                const scripts = container.querySelectorAll('script');
                scripts.forEach(oldScript => {
                    const newScript = document.createElement('script');
                    Array.from(oldScript.attributes).forEach(attr => {
                        newScript.setAttribute(attr.name, attr.value);
                    });
                    newScript.textContent = oldScript.textContent;
                    oldScript.parentNode.insertBefore(newScript, oldScript);
                    oldScript.parentNode.removeChild(oldScript);
                });
            }

            function updateActiveNav(currentUrl) {
                const urlObj = new URL(currentUrl, window.location.origin);
                const path = urlObj.pathname;

                const navLinks = bottomNav.querySelectorAll('a');
                navLinks.forEach(link => {
                    const linkUrl = new URL(link.href);
                    const linkPath = linkUrl.pathname;

                    // Beranda hanya aktif jika path persis '/dashboard'
                    // Surat Masuk/Keluar/Disposisi aktif jika path diawali dengan route path-nya
                    const isActive = (linkPath === '/dashboard' && path === '/dashboard') || 
                                     (linkPath !== '/dashboard' && path.startsWith(linkPath));

                    if (isActive) {
                        link.classList.remove('text-gray-400');
                        link.classList.add('text-[#15803d]');
                        const svg = link.querySelector('svg');
                        if (svg) {
                            svg.classList.add('scale-105', 'stroke-[2.5px]');
                            svg.classList.remove('stroke-2');
                        }
                    } else {
                        link.classList.remove('text-[#15803d]');
                        link.classList.add('text-gray-400');
                        const svg = link.querySelector('svg');
                        if (svg) {
                            svg.classList.remove('scale-105', 'stroke-[2.5px]');
                            svg.classList.add('stroke-2');
                        }
                    }
                });
            }

            // Intersept klik pada menu bottom nav mobile
            bottomNav.addEventListener('click', function(e) {
                const link = e.target.closest('a');
                if (!link) return;

                // Hanya intersept rute internal/lokal
                if (link.hostname === window.location.hostname) {
                    e.preventDefault();
                    loadPage(link.href);
                }
            });

            // Tangani tombol back/forward di browser
            window.addEventListener('popstate', function(e) {
                if (e.state && e.state.url) {
                    loadPage(e.state.url, false);
                } else {
                    loadPage(window.location.href, false);
                }
            });

            // Simpan history awal agar popstate berjalan semestinya
            window.history.replaceState({ url: window.location.href }, '', window.location.href);
        });
    </script>
</body>
</html>