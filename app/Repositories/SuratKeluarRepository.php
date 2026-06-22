<?php

namespace App\Repositories;

use App\Models\SuratKeluar;
use App\Repositories\Interfaces\SuratKeluarRepositoryInterface;

class SuratKeluarRepository implements SuratKeluarRepositoryInterface
{
    public function getAllPaginated(int $perPage = 10, array $filters = [])
    {
        $query = SuratKeluar::with(['user', 'klasifikasi']);

        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('no_agenda', 'like', "%{$search}%")
                  ->orWhere('no_surat', 'like', "%{$search}%")
                  ->orWhere('tujuan_surat', 'like', "%{$search}%")
                  ->orWhere('isi_ringkas', 'like', "%{$search}%");
            });
        }

        if (!empty($filters['kode_klasifikasi'])) {
            $query->where('kode_klasifikasi', $filters['kode_klasifikasi']);
        }

        // Memanggil relasi user dan klasifikasi sekaligus untuk mencegah overload
        return $query->latest()
            ->paginate($perPage)
            ->withQueryString();
    }

    public function getById(int $id)
    {
        return SuratKeluar::with(['user', 'klasifikasi'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return SuratKeluar::create($data);
    }

    public function update(int $id, array $data)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        $suratKeluar->update($data);
        
        return $suratKeluar;
    }

    public function delete(int $id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        return $suratKeluar->delete();
    }
}