<x-app-layout>
    <div class="animate-fade-in-up space-y-6">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800 tracking-tight">Detail Disposisi Surat</h2>
                <p class="text-sm text-gray-500 mt-1">Detail instruksi alur disposisi surat masuk.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <a href="{{ route('disposisi.index') }}" class="inline-flex items-center justify-center gap-2 rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-bold text-gray-700 shadow-sm hover:bg-gray-50 transition-all">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    Kembali
                </a>
                <a href="{{ route('disposisi.edit', $disposisi->id) }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-amber-500 px-4 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-amber-600 transition-all">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                    Edit Disposisi
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Detail Instruksi Disposisi (Kiri) -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 space-y-6">
                    <div class="border-b border-gray-100 pb-4 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">Tujuan: {{ $disposisi->tujuan_disposisi }}</h3>
                            <p class="text-sm text-gray-500 mt-1">Diproses pada tanggal: <strong class="text-gray-700">{{ \Carbon\Carbon::parse($disposisi->tgl_disposisi)->translatedFormat('d F Y') }}</strong></p>
                        </div>
                        <div>
                            @php
                                $statusClass = match(strtolower($disposisi->status)) {
                                    'selesai' => 'bg-green-100 text-green-800 border-green-200',
                                    'proses' => 'bg-blue-100 text-blue-800 border-blue-200',
                                    'ditolak' => 'bg-red-100 text-red-800 border-red-200',
                                    default => 'bg-amber-100 text-amber-800 border-amber-200'
                                };
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold border {{ $statusClass }}">
                                {{ $disposisi->status }}
                            </span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <span class="block text-xs font-extrabold text-gray-400 uppercase tracking-wider">Isi Instruksi Disposisi</span>
                        <div class="bg-gray-50 rounded-xl p-4 text-sm text-gray-700 leading-relaxed min-h-[100px]">
                            {!! nl2br(e($disposisi->isi_disposisi)) !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Surat Masuk yang Terkait (Kanan) -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-4 sticky top-6">
                    <div class="flex items-center gap-2 border-b border-gray-100 pb-3">
                        <svg class="h-5 w-5 text-[#15803d]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                        <h4 class="text-base font-bold text-gray-800">Surat Masuk Terkait</h4>
                    </div>
                    
                    @if ($disposisi->suratMasuk)
                        <div class="space-y-4 text-sm text-gray-600">
                            <div>
                                <span class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-wider">No. Agenda</span>
                                <span class="block font-semibold text-gray-800 mt-0.5">{{ $disposisi->suratMasuk->no_agenda }}</span>
                            </div>
                            <div>
                                <span class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-wider">No. Surat</span>
                                <span class="block font-semibold text-gray-800 mt-0.5">{{ $disposisi->suratMasuk->no_surat }}</span>
                            </div>
                            <div>
                                <span class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-wider">Asal Surat</span>
                                <span class="block font-semibold text-gray-800 mt-0.5">{{ $disposisi->suratMasuk->asal_surat }}</span>
                            </div>
                            <div>
                                <span class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-wider">Tanggal Surat</span>
                                <span class="block font-semibold text-gray-800 mt-0.5">
                                    {{ \Carbon\Carbon::parse($disposisi->suratMasuk->tgl_surat)->translatedFormat('d M Y') }}
                                </span>
                            </div>
                            
                            <div class="pt-3 border-t border-gray-100">
                                <a href="{{ route('surat-masuk.show', $disposisi->surat_masuk_id) }}" class="w-full inline-flex items-center justify-center gap-1.5 py-2.5 rounded-xl bg-green-50 hover:bg-green-100 text-xs font-bold text-[#15803d] transition-colors">
                                    Lihat Surat Lengkap
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-6 text-gray-400 text-xs italic">
                            Data surat terkait telah dihapus.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
