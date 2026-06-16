<?php

namespace App\Repositories\Interfaces;

interface SuratKeluarRepositoryInterface
{
    // Mengambil semua data dengan paginasi dan eager loading
    public function getAllPaginated(int $perPage = 10);

    // Mengambil satu data berdasarkan ID
    public function getById(int $id);

    // Menyimpan data baru
    public function create(array $data);

    // Memperbarui data
    public function update(int $id, array $data);

    // Menghapus data
    public function delete(int $id);
}