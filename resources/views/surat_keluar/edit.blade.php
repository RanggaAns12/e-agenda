<x-app-layout>
    <div class="animate-fade-in-up space-y-6">
        
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800 tracking-tight">Edit Surat Keluar</h2>
                <p class="text-sm text-gray-500 mt-1">Perbarui informasi untuk data surat keluar yang dipilih.</p>
            </div>
            
            <a href="{{ route('surat-keluar.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-bold text-gray-700 shadow-sm hover:bg-gray-50 transition-all">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
            <form action="{{ route('surat-keluar.update', $suratKeluar->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- No. Agenda -->
                    <div>
                        <label for="no_agenda" class="block text-sm font-bold text-gray-700 mb-2">No. Agenda <span class="text-red-500">*</span></label>
                        <input type="text" name="no_agenda" id="no_agenda" value="{{ old('no_agenda', $suratKeluar->no_agenda) }}" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('no_agenda') border-red-500 @enderror" 
                               placeholder="Contoh: 001/SK-BT/2026">
                        @error('no_agenda')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- No. Surat -->
                    <div>
                        <label for="no_surat" class="block text-sm font-bold text-gray-700 mb-2">No. Surat <span class="text-red-500">*</span></label>
                        <input type="text" name="no_surat" id="no_surat" value="{{ old('no_surat', $suratKeluar->no_surat) }}" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('no_surat') border-red-500 @enderror" 
                               placeholder="Contoh: 090/456/Kec-BT/2026">
                        @error('no_surat')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tujuan Surat -->
                    <div>
                        <label for="tujuan_surat" class="block text-sm font-bold text-gray-700 mb-2">Tujuan Surat <span class="text-red-500">*</span></label>
                        <input type="text" name="tujuan_surat" id="tujuan_surat" value="{{ old('tujuan_surat', $suratKeluar->tujuan_surat) }}" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('tujuan_surat') border-red-500 @enderror" 
                               placeholder="Contoh: Dinas Sosial Kota Binjai">
                        @error('tujuan_surat')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Klasifikasi Surat -->
                    <div>
                        <label for="kode_klasifikasi" class="block text-sm font-bold text-gray-700 mb-2">Klasifikasi Surat <span class="text-red-500">*</span></label>
                        <select name="kode_klasifikasi" id="kode_klasifikasi" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('kode_klasifikasi') border-red-500 @enderror">
                            <option value="">-- Pilih Klasifikasi --</option>
                            @foreach ($klasifikasi as $klas)
                                <option value="{{ $klas->kode_klasifikasi }}" {{ old('kode_klasifikasi', $suratKeluar->kode_klasifikasi) == $klas->kode_klasifikasi ? 'selected' : '' }}>
                                    [{{ $klas->kode_klasifikasi }}] - {{ $klas->nama_klasifikasi }}
                                </option>
                            @endforeach
                        </select>
                        @error('kode_klasifikasi')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Surat -->
                    <div>
                        <label for="tgl_surat" class="block text-sm font-bold text-gray-700 mb-2">Tanggal Surat <span class="text-red-500">*</span></label>
                        <input type="date" name="tgl_surat" id="tgl_surat" value="{{ old('tgl_surat', $suratKeluar->tgl_surat) }}" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('tgl_surat') border-red-500 @enderror">
                        @error('tgl_surat')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- File Surat (PDF/JPG/PNG) -->
                    <div>
                        <label for="file_surat" class="block text-sm font-bold text-gray-700 mb-2">File Surat (Unggah baru untuk mengganti)</label>
                        <input type="file" name="file_surat" id="file_surat" accept=".pdf,.jpg,.jpeg,.png"
                               class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all file:mr-4 file:py-1.5 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 @error('file_surat') border-red-500 @enderror">
                        
                        @if ($suratKeluar->file_surat)
                            <div class="mt-2.5 flex items-center gap-2 p-2.5 rounded-xl bg-gray-50 border border-gray-100 text-xs text-gray-600">
                                <svg class="h-4.5 w-4.5 text-[#15803d]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                                <span>File aktif: </span>
                                <a href="{{ asset('storage/' . $suratKeluar->file_surat) }}" target="_blank" class="font-bold text-[#15803d] hover:underline">
                                    {{ basename($suratKeluar->file_surat) }}
                                </a>
                            </div>
                        @else
                            <p class="text-xs text-gray-400 mt-1.5">Belum ada file dokumen terunggah.</p>
                        @endif
                        @error('file_surat')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Isi Ringkas -->
                <div>
                    <label for="isi_ringkas" class="block text-sm font-bold text-gray-700 mb-2">Isi Ringkas / Perihal <span class="text-red-500">*</span></label>
                    <textarea name="isi_ringkas" id="isi_ringkas" rows="4" required
                              class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('isi_ringkas') border-red-500 @enderror"
                              placeholder="Tuliskan ringkasan isi surat atau perihal surat disini...">{{ old('isi_ringkas', $suratKeluar->isi_ringkas) }}</textarea>
                    @error('isi_ringkas')
                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                    <button type="button" onclick="history.back()" class="px-5 py-2.5 text-sm font-bold text-gray-500 hover:text-gray-700 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-[#15803d] px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-[#115e3b] transition-all">
                        Perbarui Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
