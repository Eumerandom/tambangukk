<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanGalian extends Model
{
    /** @use HasFactory<\Database\Factories\BahanGalianFactory> */
    use HasFactory;

    protected $fillable = [
        'kode_bahan',
        'jenis_bahan',
        'volume_bahan',
        'berat_bersih',
    ];
}
