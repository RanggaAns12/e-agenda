<x-app-layout>
    <div class="animate-fade-in-up space-y-6">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800 tracking-tight">Detail Surat Keluar</h2>
                <p class="text-sm text-gray-500 mt-1">Detail arsip lengkap untuk surat keluar.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <a href="{{ route('surat-keluar.index') }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-bold text-gray-700 shadow-sm hover:bg-gray-50 transition-all">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    Kembali
                </a>
                <a href="{{ route('surat-keluar.edit', $suratKeluar->id) }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-amber-500 px-4 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-amber-600 transition-all">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                    Edit Surat
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Informasi Surat (Kiri) -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 space-y-6">
                    <div class="border-b border-gray-100 pb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800 mb-2">
                            {{ $suratKeluar->klasifikasi->nama_klasifikasi ?? 'Tanpa Klasifikasi' }}
                        </span>
                        <h3 class="text-xl font-extrabold text-gray-800">{{ $suratKeluar->no_surat }}</h3>
                        <p class="text-sm text-gray-500 mt-1">Dibuat oleh Petugas: <strong class="text-gray-700">{{ $suratKeluar->user->name ?? 'System' }}</strong></p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <span class="block text-xs font-extrabold text-gray-400 uppercase tracking-wider">No. Agenda</span>
                            <span class="block text-base font-semibold text-gray-800 mt-1">{{ $suratKeluar->no_agenda }}</span>
                        </div>
                        <div>
                            <span class="block text-xs font-extrabold text-gray-400 uppercase tracking-wider">Tujuan Surat</span>
                            <span class="block text-base font-semibold text-gray-800 mt-1">{{ $suratKeluar->tujuan_surat }}</span>
                        </div>
                        <div>
                            <span class="block text-xs font-extrabold text-gray-400 uppercase tracking-wider">Tanggal Surat</span>
                            <span class="block text-base font-semibold text-gray-800 mt-1">
                                {{ \Carbon\Carbon::parse($suratKeluar->tgl_surat)->translatedFormat('d F Y') }}
                            </span>
                        </div>
                        <div>
                            <span class="block text-xs font-extrabold text-gray-400 uppercase tracking-wider">Kode Klasifikasi</span>
                            <span class="block text-base font-semibold text-[#15803d] mt-1">{{ $suratKeluar->kode_klasifikasi }}</span>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-50">
                        <span class="block text-xs font-extrabold text-gray-400 uppercase tracking-wider mb-2">Isi Ringkas / Perihal</span>
                        <div class="bg-gray-50 rounded-xl p-4 text-sm text-gray-700 leading-relaxed">
                            {!! nl2br(e($suratKeluar->isi_ringkas)) !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Preview Lampiran Surat (Kanan) -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-4 sticky top-6">
                    <h4 class="text-base font-bold text-gray-800">Lampiran Dokumen</h4>
                    
                    @if ($suratKeluar->file_surat)
                        @php
                            $extension = pathinfo($suratKeluar->file_surat, PATHINFO_EXTENSION);
                        @endphp
                        
                        <div class="rounded-xl border border-gray-100 bg-gray-50 p-4 flex flex-col items-center text-center">
                            @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png']))
                                <img src="{{ asset('storage/' . $suratKeluar->file_surat) }}" alt="Lampiran" class="max-h-64 object-contain rounded-lg border border-gray-200 mb-4 shadow-sm bg-white">
                            @else
                                <svg class="h-16 w-16 text-red-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                            @endif
                            
                            <span class="block text-xs font-bold text-gray-800 truncate w-full mb-1">{{ basename($suratKeluar->file_surat) }}</span>
                            <span class="block text-[10px] text-gray-400 mb-4 uppercase">{{ $extension }} File</span>
                            
                            <div class="grid grid-cols-2 gap-2 w-full">
                                <a href="{{ asset('storage/' . $suratKeluar->file_surat) }}" target="_blank" class="inline-flex items-center justify-center gap-1 py-2 rounded-xl bg-green-50 hover:bg-green-100 text-xs font-bold text-[#15803d] border border-green-200/50 transition-colors">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                    Lihat File
                                </a>
                                <a href="{{ asset('storage/' . $suratKeluar->file_surat) }}" download class="inline-flex items-center justify-center gap-1 py-2 rounded-xl bg-[#15803d] hover:bg-[#115e3b] text-xs font-bold text-white shadow-sm transition-colors">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                                    Unduh
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="rounded-xl border border-dashed border-gray-200 p-8 text-center text-gray-400">
                            <svg class="h-10 w-10 mx-auto opacity-35 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                            <p class="text-xs">Tidak ada lampiran dokumen untuk surat ini.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
