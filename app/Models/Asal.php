<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asal extends Model
{
    use HasFactory;

    protected $table = 'asals';

    protected $fillable = [
        'nama_asal',
        'kode_asal',
    ];

    public function setNamaAsalAttribute($value) 
    {
        $this->attributes['nama_asal'] = ucfirst(strtolower($value)); 
    }
    
    public function setKodeAsalAttribute($value) 
    {
        $this->attributes['kode_asal'] = strtoupper($value);
    }
}
