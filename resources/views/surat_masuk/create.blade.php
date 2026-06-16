<x-app-layout>
    <div class="animate-fade-in-up space-y-6">
        
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800 tracking-tight">Tambah Surat Masuk</h2>
                <p class="text-sm text-gray-500 mt-1">Isi formulir berikut untuk mencatat dokumen surat masuk baru.</p>
            </div>
            
            <a href="{{ route('surat-masuk.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-bold text-gray-700 shadow-sm hover:bg-gray-50 transition-all">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
            <form action="{{ route('surat-masuk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- No. Agenda -->
                    <div>
                        <label for="no_agenda" class="block text-sm font-bold text-gray-700 mb-2">No. Agenda <span class="text-red-500">*</span></label>
                        <input type="text" name="no_agenda" id="no_agenda" value="{{ old('no_agenda') }}" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('no_agenda') border-red-500 @enderror" 
                               placeholder="Contoh: 001/SM-BT/2026">
                        @error('no_agenda')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- No. Surat -->
                    <div>
                        <label for="no_surat" class="block text-sm font-bold text-gray-700 mb-2">No. Surat <span class="text-red-500">*</span></label>
                        <input type="text" name="no_surat" id="no_surat" value="{{ old('no_surat') }}" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('no_surat') border-red-500 @enderror" 
                               placeholder="Contoh: 090/123/Kec-BT/2026">
                        @error('no_surat')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Asal Surat -->
                    <div>
                        <label for="asal_surat" class="block text-sm font-bold text-gray-700 mb-2">Asal Surat <span class="text-red-500">*</span></label>
                        <input type="text" name="asal_surat" id="asal_surat" value="{{ old('asal_surat') }}" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('asal_surat') border-red-500 @enderror" 
                               placeholder="Contoh: Kantor Walikota Binjai">
                        @error('asal_surat')
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
                                <option value="{{ $klas->kode_klasifikasi }}" {{ old('kode_klasifikasi') == $klas->kode_klasifikasi ? 'selected' : '' }}>
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
                        <input type="date" name="tgl_surat" id="tgl_surat" value="{{ old('tgl_surat') }}" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('tgl_surat') border-red-500 @enderror">
                        @error('tgl_surat')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- File Surat (PDF/JPG/PNG) -->
                    <div>
                        <label for="file_surat" class="block text-sm font-bold text-gray-700 mb-2">File Surat (Opsional)</label>
                        <input type="file" name="file_surat" id="file_surat" accept=".pdf,.jpg,.jpeg,.png"
                               class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all file:mr-4 file:py-1.5 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 @error('file_surat') border-red-500 @enderror">
                        <p class="text-xs text-gray-400 mt-1.5">Format yang diterima: PDF, JPG, JPEG, PNG (Maksimal 2MB).</p>
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
                              placeholder="Tuliskan ringkasan isi surat atau perihal surat disini...">{{ old('isi_ringkas') }}</textarea>
                    @error('isi_ringkas')
                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                    <button type="reset" class="px-5 py-2.5 text-sm font-bold text-gray-500 hover:text-gray-700 transition-colors">
                        Reset Form
                    </button>
                    <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-[#15803d] px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-[#115e3b] transition-all">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
