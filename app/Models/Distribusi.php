<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    /** @use HasFactory<\Database\Factories\DistribusiFactory> */
    use HasFactory;

    protected $table = 'distribusis';

    protected $fillable = [
        'id_bahan',
        'id_pengotor',
        'tgl_keluar',
    ];
}
