<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login E-Agenda - Kecamatan Binjai Timur</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-100">
    
    <div class="min-h-screen flex flex-col justify-center items-center p-4 bg-cover bg-center bg-no-repeat relative" 
         style="background-image: url('{{ asset('images/bg-login.webp') }}');">
        
        <div class="w-full sm:max-w-md bg-white shadow-2xl overflow-hidden rounded-[2rem] relative z-10">

            <div class="pt-10 px-8 pb-4 flex flex-col items-center text-center">
                <img src="{{ asset('images/logo.webp') }}" alt="Logo Binjai" class="h-24 w-auto mb-4 drop-shadow-md">
                <h1 class="text-3xl font-extrabold text-[#115e3b] tracking-tight">E-AGENDA</h1>
                <h2 class="text-base font-bold text-[#166534] mt-1">KECAMATAN BINJAI TIMUR</h2>
                <p class="text-sm text-gray-500 mt-2">Sistem agenda dan penjadwalan kegiatan</p>
            </div>

            <div class="relative flex items-center px-8 py-2">
                <div class="flex-grow border-t border-gray-100"></div>
                <span class="flex-shrink-0 mx-4 text-green-600 bg-green-50 rounded-full p-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </span>
                <div class="flex-grow border-t border-gray-100"></div>
            </div>

            <div class="px-8 pb-8 text-center">
                <h3 class="text-lg font-bold text-gray-800">Selamat Datang</h3>
                <p class="text-xs text-gray-500 mt-1 mb-6">Silakan masuk untuk melanjutkan</p>

                <form method="POST" action="{{ route('login') }}" class="text-left">
                    @csrf
                    
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    @if ($errors->any())
                        <div class="mb-4 text-sm text-red-600 bg-red-50 p-3 rounded-xl border border-red-100">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div>
                        <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus autocomplete="username" placeholder="Username" 
                               class="block w-full border-gray-200 bg-gray-50 text-gray-800 focus:bg-white focus:border-green-500 focus:ring-green-500 rounded-xl px-4 py-3 text-sm transition-colors duration-200 placeholder-gray-400">
                    </div>

                    <div class="mt-4">
                        <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password" 
                               class="block w-full border-gray-200 bg-gray-50 text-gray-800 focus:bg-white focus:border-green-500 focus:ring-green-500 rounded-xl px-4 py-3 text-sm transition-colors duration-200 placeholder-gray-400">
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-[#15803d] hover:bg-[#166534] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200 transform hover:-translate-y-0.5">
                            Masuk
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-gray-50/80 backdrop-blur-sm py-4 px-6 flex items-center justify-center gap-2 border-t border-gray-100">
                <svg class="w-4 h-4 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                <span class="text-[11px] font-bold text-green-800 tracking-wide uppercase">Melayani dengan Profesional, Transparan dan Akuntabel</span>
            </div>

        </div>
    </div>

</body>
</html>