<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('klasifikasi_surat', function (Blueprint $table) {
            // Menggunakan kode_klasifikasi (varchar) sebagai Primary Key
            $table->string('kode_klasifikasi')->primary(); 
            $table->string('nama_klasifikasi');
            $table->text('uraian')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('klasifikasi_surat');
    }
};