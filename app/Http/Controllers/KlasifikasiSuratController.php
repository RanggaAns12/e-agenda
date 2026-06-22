<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiSurat;
use Illuminate\Http\Request;
use App\Exports\KlasifikasiExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class KlasifikasiSuratController extends Controller
{
    public function index()
    {
        $klasifikasi = KlasifikasiSurat::orderBy('kode_klasifikasi', 'asc')->paginate(10);
        return view('klasifikasi.index', compact('klasifikasi'));
    }

    public function create()
    {
        return view('klasifikasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_klasifikasi' => 'required|string|max:255|unique:klasifikasi_surat,kode_klasifikasi',
            'nama_klasifikasi' => 'required|string|max:255',
            'uraian' => 'nullable|string',
        ]);

        KlasifikasiSurat::create($validated);

        return redirect()->route('klasifikasi.index')->with('success', 'Klasifikasi Surat berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $klasifikasi = KlasifikasiSurat::findOrFail($id);
        return view('klasifikasi.show', compact('klasifikasi'));
    }

    public function edit(string $id)
    {
        $klasifikasi = KlasifikasiSurat::findOrFail($id);
        return view('klasifikasi.edit', compact('klasifikasi'));
    }

    public function update(Request $request, string $id)
    {
        $klasifikasi = KlasifikasiSurat::findOrFail($id);

        $validated = $request->validate([
            // Validasi unique diabaikan untuk kode_klasifikasi milik data ini sendiri
            'kode_klasifikasi' => 'required|string|max:255|unique:klasifikasi_surat,kode_klasifikasi,' . $id . ',kode_klasifikasi',
            'nama_klasifikasi' => 'required|string|max:255',
            'uraian' => 'nullable|string',
        ]);

        $klasifikasi->update($validated);

        return redirect()->route('klasifikasi.index')->with('success', 'Klasifikasi Surat berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $klasifikasi = KlasifikasiSurat::findOrFail($id);
        $klasifikasi->delete();

        return redirect()->route('klasifikasi.index')->with('success', 'Klasifikasi Surat berhasil dihapus.');
    }

    public function exportExcel()
    {
        $klasifikasi = KlasifikasiSurat::orderBy('kode_klasifikasi', 'asc')->get();
        return Excel::download(new KlasifikasiExport($klasifikasi), 'laporan_klasifikasi_surat_' . now()->format('Ymd_His') . '.xlsx');
    }

    public function exportPdf()
    {
        $klasifikasi = KlasifikasiSurat::orderBy('kode_klasifikasi', 'asc')->get();
        $pdf = Pdf::loadView('exports.klasifikasi_pdf', compact('klasifikasi'))->setPaper('a4', 'portrait');
        return $pdf->download('laporan_klasifikasi_surat_' . now()->format('Ymd_His') . '.pdf');
    }
}