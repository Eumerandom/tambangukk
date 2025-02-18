<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis';

    protected $fillable = [
        'nama_jenis',
        'kode_jenis',
        'kategori',
    ];

    protected $casts = [
        'kategori' => 'array', // secara otomatis mengonversi JSON ke array di Laravel
    ];    
    
    public function setNamaJenisAttribute($value) //kapital awal kata
    {
        $this->attributes['nama_jenis'] = ucfirst(strtolower($value)); 
    }
    
    public function setKodeJenisAttribute($value) //agar kode_jenis kapital semua
    {
        $this->attributes['kode_jenis'] = strtoupper($value);
    }
}
