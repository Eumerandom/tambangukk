<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
    /** @use HasFactory<\Database\Factories\ProsesFactory> */
    use HasFactory;

    protected $fillable = [
        'id_proses',
        'tgl_mulai',
        'tgl_selesai',
        'status_proses',
    ];
}
