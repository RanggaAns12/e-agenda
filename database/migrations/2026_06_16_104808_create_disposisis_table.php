<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('disposisi', function (Blueprint $table) {
            $table->id(); // Sebagai id_disposisi
            
            // Relasi ke Surat Masuk
            $table->foreignId('surat_masuk_id')->constrained('surat_masuk')->cascadeOnDelete();
            
            $table->string('tujuan_disposisi');
            $table->text('isi_disposisi');
            $table->date('tgl_disposisi');
            $table->string('status');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('disposisi');
    }
};