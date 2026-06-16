<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['user_id', 'kode_klasifikasi', 'no_agenda', 'asal_surat', 'no_surat', 'tgl_surat', 'isi_ringkas', 'file_surat'])]
class SuratMasuk extends Model
{
    use HasFactory;
    protected $table = 'surat_masuk';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function klasifikasi(): BelongsTo
    {
        return $this->belongsTo(KlasifikasiSurat::class, 'kode_klasifikasi', 'kode_klasifikasi');
    }
    
    // Relasi untuk fitur Disposisi (1 Surat Masuk punya banyak Disposisi)
    public function disposisi(): HasMany
    {
        return $this->hasMany(Disposisi::class);
    }
}