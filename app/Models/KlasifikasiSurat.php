<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['kode_klasifikasi', 'nama_klasifikasi', 'uraian'])]
class KlasifikasiSurat extends Model
{
    use HasFactory;

    protected $table = 'klasifikasi_surat';
    
    // Memberi tahu Laravel bahwa Primary Key kita adalah string 'kode_klasifikasi', bukan 'id' integer
    protected $primaryKey = 'kode_klasifikasi';
    public $incrementing = false;
    protected $keyType = 'string';
}