<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSumberDaya extends Model
{
    use HasFactory;

    protected $table = 'jenis_sumber_dayas';
    protected $primaryKey = 'id_jenis';

    protected $fillable = [
        'nama_jenis',
        'kode_jenis',
    ];

    public function setNamaAttribute($value) // agar nama_jenis depannya kapital
    {
        $this->attributes['nama_jenis'] = ucfirst(strtolower($value));
    }

    public function setKodeAsalAttribute($value) // agar kode_jenis kapital sema
    {
        $this->attributes['kode_jenis'] = strtoupper($value);
    }
}
