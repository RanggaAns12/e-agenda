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

            <main class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10 w-full animate-fade-in-up">
                
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
</body>
</html>