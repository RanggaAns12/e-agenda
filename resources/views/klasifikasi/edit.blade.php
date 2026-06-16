<x-app-layout>
    <div class="animate-fade-in-up space-y-6">
        
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-extrabold text-gray-800 tracking-tight">Edit Klasifikasi Surat</h2>
                <p class="text-sm text-gray-500 mt-1">Perbarui informasi kode klasifikasi surat.</p>
            </div>
            
            <a href="{{ route('klasifikasi.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-bold text-gray-700 shadow-sm hover:bg-gray-50 transition-all">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
            <form action="{{ route('klasifikasi.update', $klasifikasi->kode_klasifikasi) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kode Klasifikasi -->
                    <div>
                        <label for="kode_klasifikasi" class="block text-sm font-bold text-gray-700 mb-2">Kode Klasifikasi <span class="text-red-500">*</span></label>
                        <input type="text" name="kode_klasifikasi" id="kode_klasifikasi" value="{{ old('kode_klasifikasi', $klasifikasi->kode_klasifikasi) }}" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('kode_klasifikasi') border-red-500 @enderror" 
                               placeholder="Contoh: 090, 800, 100">
                        @error('kode_klasifikasi')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Klasifikasi -->
                    <div>
                        <label for="nama_klasifikasi" class="block text-sm font-bold text-gray-700 mb-2">Nama Klasifikasi <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_klasifikasi" id="nama_klasifikasi" value="{{ old('nama_klasifikasi', $klasifikasi->nama_klasifikasi) }}" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('nama_klasifikasi') border-red-500 @enderror" 
                               placeholder="Contoh: Surat Undangan / Surat Keputusan">
                        @error('nama_klasifikasi')
                            <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Uraian / Deskripsi -->
                <div>
                    <label for="uraian" class="block text-sm font-bold text-gray-700 mb-2">Uraian / Deskripsi (Opsional)</label>
                    <textarea name="uraian" id="uraian" rows="4"
                              class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('uraian') border-red-500 @enderror"
                              placeholder="Tuliskan penjelasan singkat mengenai kode klasifikasi ini...">{{ old('uraian', $klasifikasi->uraian) }}</textarea>
                    @error('uraian')
                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                    <button type="button" onclick="history.back()" class="px-5 py-2.5 text-sm font-bold text-gray-500 hover:text-gray-700 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-[#15803d] px-6 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-[#115e3b] transition-all">
                        Perbarui Klasifikasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
