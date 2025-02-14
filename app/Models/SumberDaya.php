<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberDaya extends Model
{
    /** @use HasFactory<\Database\Factories\SumberDayaFactory> */
    use HasFactory;

    protected $table = 'sumber_dayas';

    protected $fillable = [
        'kode_sda',
        'jenis_sda',
        'volume_sda',
        'berat_kotor',
        'asal_sda',
    ];
}
