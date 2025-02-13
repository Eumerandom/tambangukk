<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    /** @use HasFactory<\Database\Factories\DistribusiFactory> */
    use HasFactory;

    protected $fillable = [
        'tgl_keluar',
    ];
}
