<?php

namespace App\Repositories\Interfaces;

interface SuratKeluarRepositoryInterface
{
    // Mengambil semua data dengan paginasi, eager loading, dan filter
    public function getAllPaginated(int $perPage = 10, array $filters = []);

    // Mengambil satu data berdasarkan ID
    public function getById(int $id);

    // Menyimpan data baru
    public function create(array $data);

    // Memperbarui data
    public function update(int $id, array $data);

    // Menghapus data
    public function delete(int $id);
}