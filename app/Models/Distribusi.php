<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribusi extends Model
{
    use HasFactory;

    protected $table = 'dtribusis';

    protected $fillable = [
        'stone_piles_id',
        'tgl_keluar',
        'tujuan',
    ];
}
    