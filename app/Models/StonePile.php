<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StonePile extends Model
{
    use HasFactory;

    protected $table = 'stone_piles';

    protected $fillable = [
        'bahan_galians_id',
        'mineral_pengotors_id',
        'kategori',
    ];
}
