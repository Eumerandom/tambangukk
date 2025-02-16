<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MineralPengotor extends Model
{
    use HasFactory;

    protected $table = 'mineral_pengotors';

    protected $fillable = [
        'jenis_id',
        'asals_id',
        'volume',
        'berat',
    ];
}
