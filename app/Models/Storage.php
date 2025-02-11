<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    /** @use HasFactory<\Database\Factories\StorageFactory> */
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'jenis_mineral',
        'berat_bersih',
        'jenis_limbah',
        'berat_limbah',
        'tgl_masuk_storage',
        'tgl_selesai_storage',
        'tujuan_distribusi',
    ];
}
