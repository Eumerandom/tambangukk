<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    /** @use HasFactory<\Database\Factories\DataFactory> */
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'jenis_mineral',
        'asal_mineral',
        'berat_kotor',
        'berat_bersih',
        'tgl_masuk',
    ];
}

