<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    public function index()
    {
        // Memanggil relasi suratMasuk sekaligus
        $disposisi = Disposisi::with('suratMasuk')->latest()->paginate(10);
        return view('disposisi.index', compact('disposisi'));
    }

    public function create()
    {
        $suratMasuk = SuratMasuk::latest()->get();
        return view('disposisi.create', compact('suratMasuk'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'surat_masuk_id' => 'required|exists:surat_masuk,id',
            'tujuan_disposisi' => 'required|string|max:255',
            'isi_disposisi' => 'required|string',
            'tgl_disposisi' => 'required|date',
            'status' => 'required|string|max:255',
        ]);

        Disposisi::create($validated);

        return redirect()->route('disposisi.index')->with('success', 'Data Disposisi berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $disposisi = Disposisi::with('suratMasuk')->findOrFail($id);
        return view('disposisi.show', compact('disposisi'));
    }

    public function edit(string $id)
    {
        $disposisi = Disposisi::findOrFail($id);
        $suratMasuk = SuratMasuk::latest()->get();
        return view('disposisi.edit', compact('disposisi', 'suratMasuk'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'surat_masuk_id' => 'required|exists:surat_masuk,id',
            'tujuan_disposisi' => 'required|string|max:255',
            'isi_disposisi' => 'required|string',
            'tgl_disposisi' => 'required|date',
            'status' => 'required|string|max:255',
        ]);

        $disposisi = Disposisi::findOrFail($id);
        $disposisi->update($validated);

        return redirect()->route('disposisi.index')->with('success', 'Data Disposisi berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $disposisi = Disposisi::findOrFail($id);
        $disposisi->delete();

        return redirect()->route('disposisi.index')->with('success', 'Data Disposisi berhasil dihapus.');
    }
}