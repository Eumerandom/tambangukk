<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processing extends Model
{
    /** @use HasFactory<\Database\Factories\ProcessingFactory> */
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'jenis_mineral',
        'tgl_masuk_proses',
        'tgl_selesai_proses',
        'status_proses',
        'berat_kotor',
        'berat_bersih',
        'jenis_limbah',
        'berat_limbah',
    ];
}
