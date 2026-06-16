<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat Akun Admin
        User::firstOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'), // Password standarnya: password
                'role' => 'admin',
            ]
        );

        // Membuat Akun Petugas Pertama
        User::firstOrCreate(
            ['username' => 'petugas1'],
            [
                'name' => 'Petugas Satu',
                'password' => Hash::make('password'),
                'role' => 'petugas',
            ]
        );
    }
}