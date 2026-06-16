<x-app-layout>
    <div x-data="{ showDeleteModal: false, deleteUrl: '' }" class="animate-fade-in-up space-y-6">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800 tracking-tight">Manajemen Pengguna</h2>
                <p class="text-sm text-gray-500 mt-1">Kelola data petugas dan administrator yang dapat mengakses sistem.</p>
            </div>
            
            <a href="{{ route('users.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#15803d] px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-[#115e3b] hover:shadow-md transition-all">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Tambah Pengguna
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto no-scrollbar">
                <table class="w-full whitespace-nowrap text-left text-sm text-gray-600">
                    <thead class="bg-gray-50/80 text-gray-800 uppercase text-xs font-extrabold tracking-wider border-b border-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-4">Nama Lengkap</th>
                            <th scope="col" class="px-6 py-4">Username</th>
                            <th scope="col" class="px-6 py-4">Role / Hak Akses</th>
                            <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($users as $user)
                            <tr class="hover:bg-green-50/30 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-green-100 text-[#15803d] font-bold text-sm uppercase">
                                            {{ substr($user->name, 0, 2) }}
                                        </div>
                                        <span class="font-bold text-gray-800">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-600">{{ $user->username }}</td>
                                <td class="px-6 py-4">
                                    @if ($user->role === 'admin')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-purple-100 text-purple-800">
                                            Administrator
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-800">
                                            Petugas Agenda
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 flex justify-center gap-3">
                                    <a href="{{ route('users.edit', $user->id) }}" class="text-amber-500 hover:text-amber-700 bg-amber-50 hover:bg-amber-100 p-2 rounded-lg transition-colors" title="Edit">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                    </a>
                                    @if (Auth::id() !== $user->id)
                                        <button @click="showDeleteModal = true; deleteUrl = '{{ route('users.destroy', $user->id) }}'" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors" title="Hapus">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </button>
                                    @else
                                        <span class="text-xs text-gray-400 font-medium italic p-2 select-none">Akun Aktif</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-gray-400">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="h-12 w-12 mb-3 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                        <p class="text-base font-medium text-gray-500">Belum ada data pengguna.</p>
                                    </div>
                                </td>
                            </tr>
                        @endempty
                    </tbody>
                </table>
            </div>
            
            @if ($users->hasPages())
                <div class="border-t border-gray-100 px-6 py-4 bg-gray-50/50">
                    {{ $users->links() }}
                </div>
            @endif
        </div>

        <!-- Modal Hapus -->
        <div x-show="showDeleteModal" style="display: none;" class="fixed inset-0 z-[999] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex min-h-screen items-end justify-center px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                
                <div x-show="showDeleteModal" 
                     x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" 
                     class="fixed inset-0 bg-gray-900 bg-opacity-60 backdrop-blur-sm transition-opacity" @click="showDeleteModal = false"></div>

                <span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>

                <div x-show="showDeleteModal" 
                     x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                     x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                     class="relative inline-block transform overflow-hidden rounded-2xl bg-white text-left align-bottom shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md sm:align-middle">
                    
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg font-bold leading-6 text-gray-900" id="modal-title">Hapus Akun Pengguna</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Apakah Anda yakin ingin menghapus pengguna ini secara permanen dari sistem? Tindakan ini tidak dapat dibatalkan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <form :action="deleteUrl" method="POST" class="inline-flex w-full sm:w-auto">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex w-full justify-center rounded-xl border border-transparent bg-red-600 px-4 py-2 text-base font-bold text-white shadow-sm hover:bg-red-700 sm:ml-3 sm:w-auto sm:text-sm">Ya, Hapus Pengguna</button>
                        </form>
                        <button @click="showDeleteModal = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-xl border border-gray-300 bg-white px-4 py-2 text-base font-bold text-gray-700 shadow-sm hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Batal</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
