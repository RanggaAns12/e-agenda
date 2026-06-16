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
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id(); // Ini merepresentasikan id_surat_keluar
            
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            
            $table->string('kode_klasifikasi');
            $table->foreign('kode_klasifikasi')->references('kode_klasifikasi')->on('klasifikasi_surat')->cascadeOnDelete();
            
            $table->string('no_agenda');
            $table->string('tujuan_surat'); // Perbedaan dengan surat masuk ada di tujuan
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
        Schema::dropIfExists('surat_keluar');
    }
};