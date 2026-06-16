<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Import untuk Surat Masuk (yang tadi)
use App\Repositories\Interfaces\SuratMasukRepositoryInterface;
use App\Repositories\SuratMasukRepository;

// Import untuk Surat Keluar (Yang Baru)
use App\Repositories\Interfaces\SuratKeluarRepositoryInterface;
use App\Repositories\SuratKeluarRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Binding Surat Masuk
        $this->app->bind(SuratMasukRepositoryInterface::class, SuratMasukRepository::class);
        
        // Binding Surat Keluar
        $this->app->bind(SuratKeluarRepositoryInterface::class, SuratKeluarRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}