<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['surat_masuk_id', 'tujuan_disposisi', 'isi_disposisi', 'tgl_disposisi', 'status'])]
class Disposisi extends Model
{
    use HasFactory;
    protected $table = 'disposisi';

    public function suratMasuk(): BelongsTo
    {
        return $this->belongsTo(SuratMasuk::class);
    }
}