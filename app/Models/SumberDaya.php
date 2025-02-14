<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberDaya extends Model
{
    /** @use HasFactory<\Database\Factories\SumberDayaFactory> */
    use HasFactory;

    protected $table = 'sumber_dayas';
    protected $primaryKey = 'id_sda'; // menentukan primary key, karena secara default id tak ada embel-embel lainnya

    protected $fillable = [
        'id_jenis',
        'id_asal',
        'kode_sda',
        'volume_sda',
        'berat_kotor',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($sumberDaya) {
            $sumberDaya->kode_sda = self::generateKode($sumberDaya);
        });
    }

    private static function generateKode($sumberDaya)
    {
        $jenis = JenisSumberDaya::find($sumberDaya->id_jenis);
        $asal = AsalSumberDaya::find($sumberDaya->id_asal);

        // Pastikan tidak ada nilai kosong
        if (!$jenis || !$asal) {
            return null; 
        }

        $tanggal = now()->format('ymd');
        $count = SumberDaya::whereDate('created_at', now()->toDateString())->count() + 1;

        return strtoupper("{$jenis->kode_jenis}-{$asal->kode_asal}-{$tanggal}-" . str_pad($count, 3, '0', STR_PAD_LEFT));
    }

    public function jenis()
    {
        return $this->belongsTo(JenisSumberDaya::class, 'id_jenis');
    }

    public function asal()
    {
        return $this->belongsTo(AsalSumberDaya::class, 'id_asal');
    }

}
