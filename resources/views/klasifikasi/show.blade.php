<x-app-layout>
    <div class="animate-fade-in-up space-y-6">
        
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800 tracking-tight">Detail Klasifikasi Surat</h2>
                <p class="text-sm text-gray-500 mt-1">Detail informasi kode klasifikasi arsip surat.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <a href="{{ route('klasifikasi.index') }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-bold text-gray-700 shadow-sm hover:bg-gray-50 transition-all">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    Kembali
                </a>
                <a href="{{ route('klasifikasi.edit', $klasifikasi->kode_klasifikasi) }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-amber-500 px-4 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-amber-600 transition-all">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                    Edit Klasifikasi
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 space-y-6">
            <div class="border-b border-gray-100 pb-4">
                <span class="block text-xs font-extrabold text-[#15803d] uppercase tracking-wider">Kode Klasifikasi</span>
                <h3 class="text-3xl font-extrabold text-gray-800 mt-1">{{ $klasifikasi->kode_klasifikasi }}</h3>
            </div>

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <span class="block text-xs font-extrabold text-gray-400 uppercase tracking-wider">Nama Klasifikasi</span>
                    <span class="block text-lg font-semibold text-gray-800 mt-1">{{ $klasifikasi->nama_klasifikasi }}</span>
                </div>
                
                <div class="pt-4 border-t border-gray-50">
                    <span class="block text-xs font-extrabold text-gray-400 uppercase tracking-wider mb-2">Uraian / Deskripsi Lengkap</span>
                    <div class="bg-gray-50 rounded-xl p-4 text-sm text-gray-700 leading-relaxed min-h-[80px]">
                        {!! $klasifikasi->uraian ? nl2br(e($klasifikasi->uraian)) : '<span class="italic text-gray-400">Tidak ada uraian deskripsi.</span>' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
