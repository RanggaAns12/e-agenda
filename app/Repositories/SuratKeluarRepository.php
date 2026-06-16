<?php

namespace App\Repositories;

use App\Models\SuratKeluar;
use App\Repositories\Interfaces\SuratKeluarRepositoryInterface;

class SuratKeluarRepository implements SuratKeluarRepositoryInterface
{
    public function getAllPaginated(int $perPage = 10)
    {
        // Memanggil relasi user dan klasifikasi sekaligus untuk mencegah overload
        return SuratKeluar::with(['user', 'klasifikasi'])
            ->latest()
            ->paginate($perPage);
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