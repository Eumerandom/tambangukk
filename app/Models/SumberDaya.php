<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberDaya extends Model
{
    use HasFactory;

    protected $table = 'sumber_dayas';

    protected $fillable = [
        'data_id',
        'tgl_masuk',
    ];

    // Relasi dengan tabel data
    public function data()
    {
        return $this->belongsTo(Data::class, 'data_id');
    }

}
