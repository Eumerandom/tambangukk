<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsalSumberDaya extends Model
{
    use HasFactory;

    protected $table = 'asal_sumber_dayas';
    protected $primaryKey = 'id_asal';

    protected $fillable = [
        'nama_asal',
        'kode_asal',
    ];
    
    public function setNamaAttribute($value) //awal huruf nama_asal kapital
    {
        $this->attributes['nama_asal'] = ucfirst(strtolower($value));
    }

    public function setKodeAsalAttribute($value) //semua huruf kode_asal kapital
    {
        $this->attributes['kode_asal'] = strtoupper($value);
    }
}
