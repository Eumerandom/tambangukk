<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
    use HasFactory;

    protected $table = 'proses';

    protected $fillable = [
        'data_id',
        'status',
        'tgl_mulai',
        'tgl_selesai',
        'bahan_galians_id',
        'mineral_pengotors_id',
    ];
}
