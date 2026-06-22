<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiSurat;
use App\Repositories\Interfaces\SuratKeluarRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    private $suratKeluarRepository;

    public function __construct(SuratKeluarRepositoryInterface $suratKeluarRepository)
    {
        $this->suratKeluarRepository = $suratKeluarRepository;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['search', 'kode_klasifikasi']);

        $suratKeluar = $this->suratKeluarRepository->getAllPaginated(10, $filters);
        $klasifikasi = KlasifikasiSurat::all();
        
        return view('surat_keluar.index', compact('suratKeluar', 'klasifikasi'));
    }

    public function create()
    {
        $klasifikasi = KlasifikasiSurat::all();
        
        return view('surat_keluar.create', compact('klasifikasi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_klasifikasi' => 'required|string|exists:klasifikasi_surat,kode_klasifikasi',
            'no_agenda' => 'required|string|max:255',
            'tujuan_surat' => 'required|string|max:255', // Perhatikan: Surat Keluar menggunakan tujuan_surat
            'no_surat' => 'required|string|max:255',
            'tgl_surat' => 'required|date',
            'isi_ringkas' => 'required|string',
            'file_surat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('file_surat')) {
            $validated['file_surat'] = $request->file('file_surat')->store('uploads/surat_keluar', 'public');
        }

        $validated['user_id'] = Auth::id();

        $this->suratKeluarRepository->create($validated);

        return redirect()->route('surat-keluar.index')->with('success', 'Data Surat Keluar berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $suratKeluar = $this->suratKeluarRepository->getById($id);
        
        return view('surat_keluar.show', compact('suratKeluar'));
    }

    public function edit(string $id)
    {
        $suratKeluar = $this->suratKeluarRepository->getById($id);
        $klasifikasi = KlasifikasiSurat::all();
        
        return view('surat_keluar.edit', compact('suratKeluar', 'klasifikasi'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_klasifikasi' => 'required|string|exists:klasifikasi_surat,kode_klasifikasi',
            'no_agenda' => 'required|string|max:255',
            'tujuan_surat' => 'required|string|max:255',
            'no_surat' => 'required|string|max:255',
            'tgl_surat' => 'required|date',
            'isi_ringkas' => 'required|string',
            'file_surat' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $suratKeluar = $this->suratKeluarRepository->getById($id);

        if ($request->hasFile('file_surat')) {
            if ($suratKeluar->file_surat && Storage::disk('public')->exists($suratKeluar->file_surat)) {
                Storage::disk('public')->delete($suratKeluar->file_surat);
            }
            $validated['file_surat'] = $request->file('file_surat')->store('uploads/surat_keluar', 'public');
        }

        $this->suratKeluarRepository->update($id, $validated);

        return redirect()->route('surat-keluar.index')->with('success', 'Data Surat Keluar berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $suratKeluar = $this->suratKeluarRepository->getById($id);

        if ($suratKeluar->file_surat && Storage::disk('public')->exists($suratKeluar->file_surat)) {
            Storage::disk('public')->delete($suratKeluar->file_surat);
        }

        $this->suratKeluarRepository->delete($id);

        return redirect()->route('surat-keluar.index')->with('success', 'Data Surat Keluar berhasil dihapus.');
    }
}