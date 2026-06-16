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
    public function getAllPaginated(int $perPage = 10)
    {
        return SuratMasuk::with(['user', 'klasifikasi'])
            ->latest() // Mengurutkan dari yang terbaru
            ->paginate($perPage); // Membatasi jumlah data per halaman
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