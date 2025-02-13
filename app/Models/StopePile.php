<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StopePile extends Model
{
    /** @use HasFactory<\Database\Factories\StopePileFactory> */
    use HasFactory;

    protected $table = 'stope_piles';

    protected $fillable = [
        'id_bahan',
        'id_pengotor',
    ];
}
