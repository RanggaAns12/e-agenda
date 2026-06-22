<?php

namespace App\Repositories;

use App\Models\SuratMasuk;
use App\Repositories\Interfaces\SuratMasukRepositoryInterface;

class SuratMasukRepository implements SuratMasukRepositoryInterface
{
    /**
     * Eager Loading: 'user' dan 'klasifikasi' dipanggil di awal 
     * agar server tidak query berulang kali saat menampilkan data.
     */
    public function getAllPaginated(int $perPage = 10, array $filters = [])
    {
        $query = SuratMasuk::with(['user', 'klasifikasi']);

        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('no_agenda', 'like', "%{$search}%")
                  ->orWhere('no_surat', 'like', "%{$search}%")
                  ->orWhere('asal_surat', 'like', "%{$search}%")
                  ->orWhere('isi_ringkas', 'like', "%{$search}%");
            });
        }

        if (!empty($filters['kode_klasifikasi'])) {
            $query->where('kode_klasifikasi', $filters['kode_klasifikasi']);
        }

        return $query->latest() // Mengurutkan dari yang terbaru
            ->paginate($perPage) // Membatasi jumlah data per halaman
            ->withQueryString(); // Mempertahankan parameter filter saat berpindah halaman
    }

    public function getAllFiltered(array $filters = [])
    {
        $query = SuratMasuk::with(['user', 'klasifikasi']);

        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('no_agenda', 'like', "%{$search}%")
                  ->orWhere('no_surat', 'like', "%{$search}%")
                  ->orWhere('asal_surat', 'like', "%{$search}%")
                  ->orWhere('isi_ringkas', 'like', "%{$search}%");
            });
        }

        if (!empty($filters['kode_klasifikasi'])) {
            $query->where('kode_klasifikasi', $filters['kode_klasifikasi']);
        }

        return $query->latest()->get();
    }

    public function getById(int $id)
    {
        return SuratMasuk::with(['user', 'klasifikasi'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return SuratMasuk::create($data);
    }

    public function update(int $id, array $data)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        $suratMasuk->update($data);
        
        return $suratMasuk;
    }

    public function delete(int $id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return $suratMasuk->delete();
    }
}