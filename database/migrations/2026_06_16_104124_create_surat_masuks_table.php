<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id(); // Ini merepresentasikan id_surat_masuk
            
            // Relasi ke User
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            
            // Relasi ke Klasifikasi Surat
            $table->string('kode_klasifikasi');
            $table->foreign('kode_klasifikasi')->references('kode_klasifikasi')->on('klasifikasi_surat')->cascadeOnDelete();
            
            // Kolom lainnya sesuai gambar
            $table->string('no_agenda');
            $table->string('asal_surat');
            $table->string('no_surat');
            $table->date('tgl_surat');
            $table->text('isi_ringkas');
            $table->string('file_surat')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuk');
    }
};