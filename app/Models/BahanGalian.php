<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanGalian extends Model
{
    use HasFactory;

    protected $table = 'bahan_galians';

    protected $fillable = [
        'jenis_id',
        'asals_id',
        'volume',
        'berat_bersih',
    ];
}
