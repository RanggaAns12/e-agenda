<x-app-layout>
    <div class="animate-fade-in-up space-y-6">
        
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800 tracking-tight">Tambah Disposisi</h2>
                <p class="text-sm text-gray-500 mt-1">Buat instruksi disposisi baru untuk surat masuk.</p>
            </div>
            
            <a href="{{ route('disposisi.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-bold text-gray-700 shadow-sm hover:bg-gray-50 transition-all">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
            <form action="{{ route('disposisi.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Pilih Surat Masuk -->
                    <div>
                        <label for="surat_masuk_id" class="block text-sm font-bold text-gray-700 mb-2">Pilih Surat Masuk <span class="text-red-500">*</span></label>
                        <select name="surat_masuk_id" id="surat_masuk_id" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('surat_masuk_id') border-red-500 @enderror">
                            <option value="">-- Pilih Surat Masuk --</option>
                            @foreach ($suratMasuk as $surat)
                                <option value="{{ $surat->id }}" {{ old('surat_masuk_id', request('surat_masuk_id')) == $surat->id ? 'selected' : '' }}>
                                    [{{ $surat->no_agenda }}] {{ $surat->no_surat }} - {{ $surat->asal_surat }}
                                </option>
                            @endforeach
                        </select>
                        @error('surat_masuk_id')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tujuan Disposisi -->
                    <div>
                        <label for="tujuan_disposisi" class="block text-sm font-bold text-gray-700 mb-2">Tujuan Disposisi <span class="text-red-500">*</span></label>
                        <input type="text" name="tujuan_disposisi" id="tujuan_disposisi" value="{{ old('tujuan_disposisi') }}" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('tujuan_disposisi') border-red-500 @enderror" 
                               placeholder="Contoh: Sekretaris Camat / Kasi Tapem">
                        @error('tujuan_disposisi')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Disposisi -->
                    <div>
                        <label for="tgl_disposisi" class="block text-sm font-bold text-gray-700 mb-2">Tanggal Disposisi <span class="text-red-500">*</span></label>
                        <input type="date" name="tgl_disposisi" id="tgl_disposisi" value="{{ old('tgl_disposisi', date('Y-m-d')) }}" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('tgl_disposisi') border-red-500 @enderror">
                        @error('tgl_disposisi')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Disposisi -->
                    <div>
                        <label for="status" class="block text-sm font-bold text-gray-700 mb-2">Status Disposisi <span class="text-red-500">*</span></label>
                        <select name="status" id="status" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('status') border-red-500 @enderror">
                            <option value="">-- Pilih Status --</option>
                            <option value="Diteruskan" {{ old('status') == 'Diteruskan' ? 'selected' : '' }}>Diteruskan</option>
                            <option value="Proses" {{ old('status') == 'Proses' ? 'selected' : '' }}>Proses</option>
                            <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Ditolak" {{ old('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Isi Instruksi Disposisi -->
                <div>
                    <label for="isi_disposisi" class="block text-sm font-bold text-gray-700 mb-2">Isi Instruksi Disposisi <span class="text-red-500">*</span></label>
                    <textarea name="isi_disposisi" id="isi_disposisi" rows="4" required
                              class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('isi_disposisi') border-red-500 @enderror"
                              placeholder="Tuliskan instruksi atau disposisi detail dari pimpinan..."></textarea>
                    @error('isi_disposisi')
                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                    <button type="reset" class="px-5 py-2.5 text-sm font-bold text-gray-500 hover:text-gray-700 transition-colors">
                        Reset Form
                    </button>
                    <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-[#15803d] px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-[#115e3b] transition-all">
                        Simpan Disposisi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
