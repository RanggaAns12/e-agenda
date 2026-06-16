<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Aktifkan UserSeeder
        $this->call([
            UserSeeder::class,
            KlasifikasiSuratSeeder::class,
            SuratMasukSeeder::class,
            SuratKeluarSeeder::class,
            DisposisiSeeder::class,
        ]);
    }
}