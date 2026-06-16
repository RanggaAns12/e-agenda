<x-app-layout>
    <div class="animate-fade-in-up space-y-6">
        
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800 tracking-tight">Detail Pengguna</h2>
                <p class="text-sm text-gray-500 mt-1">Detail informasi akun pengguna.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <a href="{{ route('users.index') }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-bold text-gray-700 shadow-sm hover:bg-gray-50 transition-all">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    Kembali
                </a>
                <a href="{{ route('users.edit', $user->id) }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-amber-500 px-4 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-amber-600 transition-all">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                    Edit Akun
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 space-y-6">
            <div class="border-b border-gray-100 pb-4 flex items-center gap-4">
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-green-100 text-[#15803d] font-bold text-2xl uppercase">
                    {{ substr($user->name, 0, 2) }}
                </div>
                <div>
                    <h3 class="text-2xl font-extrabold text-gray-800">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-500 mt-1">Dibuat pada: <strong class="text-gray-700">{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('d F Y') }}</strong></p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <span class="block text-xs font-extrabold text-gray-400 uppercase tracking-wider">Username</span>
                    <span class="block text-lg font-semibold text-gray-800 mt-1">{{ $user->username }}</span>
                </div>
                
                <div>
                    <span class="block text-xs font-extrabold text-gray-400 uppercase tracking-wider">Role / Hak Akses</span>
                    <span class="block text-lg font-semibold mt-1">
                        @if ($user->role === 'admin')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-purple-100 text-purple-800">
                                Administrator
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-800">
                                Petugas Agenda
                            </span>
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
