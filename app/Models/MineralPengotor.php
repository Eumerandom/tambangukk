<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MineralPengotor extends Model
{
    /** @use HasFactory<\Database\Factories\MineralPengotorFactory> */
    use HasFactory;

    protected $fillable = [
        'jenis_pengotor',
        'volume_pengotor',
        'berat_pengotor',
    ];
}
