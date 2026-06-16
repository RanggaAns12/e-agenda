<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'kode_klasifikasi', 'no_agenda', 'tujuan_surat', 'no_surat', 'tgl_surat', 'isi_ringkas', 'file_surat'])]
class SuratKeluar extends Model
{
    use HasFactory;
    protected $table = 'surat_keluar';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function klasifikasi(): BelongsTo
    {
        return $this->belongsTo(KlasifikasiSurat::class, 'kode_klasifikasi', 'kode_klasifikasi');
    }
}