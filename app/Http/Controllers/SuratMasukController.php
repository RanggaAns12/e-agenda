<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiSurat;
use App\Repositories\Interfaces\SuratMasukRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    private $suratMasukRepository;

    // Menyuntikkan (Inject) Repository ke dalam Controller
    public function __construct(SuratMasukRepositoryInterface $suratMasukRepository)
    {
        $this->suratMasukRepository = $suratMasukRepository;
    }

    public function index()
    {
        // Mengambil data menggunakan Repository (anti-overload karena sudah dipaginasi)
        $suratMasuk = $this->suratMasukRepository->getAllPaginated(10);
        
        return view('surat_masuk.index', compact('suratMasuk'));
    }

    public function create()
    {
        // Menarik data klasifikasi untuk ditampilkan di pilihan dropdown form
        $klasifikasi = KlasifikasiSurat::all();
        
        return view('surat_masuk.create', compact('klasifikasi'));
    }

    public function store(Request $request)
    {
        // 1. Validasi Input dari User
        $validated = $request->validate([
            'kode_klasifikasi' => 'required|string|exists:klasifikasi_surat,kode_klasifikasi',
            'no_agenda' => 'required|string|max:255',
            'asal_surat' => 'required|string|max:255',
            'no_surat' => 'required|string|max:255',
            'tgl_surat' => 'required|date',
            'isi_ringkas' => 'required|string',
            'file_surat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Maksimal file 2MB
        ]);

        // 2. Proses Upload File (Jika user mengunggah file)
        if ($request->hasFile('file_surat')) {
            // Simpan ke folder storage/app/public/uploads/surat_masuk
            $validated['file_surat'] = $request->file('file_surat')->store('uploads/surat_masuk', 'public');
        }

        // 3. Catat ID User yang sedang login
        $validated['user_id'] = Auth::id();

        // 4. Simpan ke Database lewat Repository
        $this->suratMasukRepository->create($validated);

        return redirect()->route('surat-masuk.index')->with('success', 'Data Surat Masuk berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $suratMasuk = $this->suratMasukRepository->getById($id);
        
        return view('surat_masuk.show', compact('suratMasuk'));
    }

    public function edit(string $id)
    {
        $suratMasuk = $this->suratMasukRepository->getById($id);
        $klasifikasi = KlasifikasiSurat::all();
        
        return view('surat_masuk.edit', compact('suratMasuk', 'klasifikasi'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_klasifikasi' => 'required|string|exists:klasifikasi_surat,kode_klasifikasi',
            'no_agenda' => 'required|string|max:255',
            'asal_surat' => 'required|string|max:255',
            'no_surat' => 'required|string|max:255',
            'tgl_surat' => 'required|date',
            'isi_ringkas' => 'required|string',
            'file_surat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $suratMasuk = $this->suratMasukRepository->getById($id);

        // Cek jika ada file baru yang diunggah saat proses edit
        if ($request->hasFile('file_surat')) {
            // Hapus file lama di server agar penyimpanan tidak penuh
            if ($suratMasuk->file_surat && Storage::disk('public')->exists($suratMasuk->file_surat)) {
                Storage::disk('public')->delete($suratMasuk->file_surat);
            }
            // Simpan file baru
            $validated['file_surat'] = $request->file('file_surat')->store('uploads/surat_masuk', 'public');
        }

        $this->suratMasukRepository->update($id, $validated);

        return redirect()->route('surat-masuk.index')->with('success', 'Data Surat Masuk berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $suratMasuk = $this->suratMasukRepository->getById($id);

        // Hapus file fisik dari server sebelum data di database dihapus
        if ($suratMasuk->file_surat && Storage::disk('public')->exists($suratMasuk->file_surat)) {
            Storage::disk('public')->delete($suratMasuk->file_surat);
        }

        $this->suratMasukRepository->delete($id);

        return redirect()->route('surat-masuk.index')->with('success', 'Data Surat Masuk berhasil dihapus.');
    }
}