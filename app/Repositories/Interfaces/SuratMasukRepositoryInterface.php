<?php

namespace App\Repositories\Interfaces;

interface SuratMasukRepositoryInterface
{
    // Mengambil semua data dengan paginasi, relasi (Eager Loading), dan filter
    public function getAllPaginated(int $perPage = 10, array $filters = []);

    // Mengambil satu data berdasarkan ID beserta relasinya
    public function getById(int $id);

    // Menyimpan data baru
    public function create(array $data);

    // Memperbarui data
    public function update(int $id, array $data);

    // Menghapus data
    public function delete(int $id);
}