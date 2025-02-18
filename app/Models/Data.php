<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'data';

    protected $fillable = [
        'jenis_id',
        'asals_id',
        'kode_sda',
        'volume_sda',
        'berat_kotor',
    ];

    // Jika kode harus selalu otomatis dibuat saat record dibuat dan tidak boleh diedit, gunakan boot() dengan creating.
    // Jika ingin kode bisa otomatis dibuat tapi juga bisa diubah manual, gunakan Mutator (set[bla]Attribute).
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($data) {
            $data->kode_sda = self::generateKode($data);
        });
    }

    private static function generateKode($data)
    {
        $jenis = Jenis::find($data->jenis_id); // Mengambil data dari tabel jenis berdasarkan id_jenis yang dikirim dari $data
        $asal = Asal::find($data->asals_id); // Mengambil data dari ta   bel asal berdasarkan id_asal yang dikirim dari $data

        // Jika salah satu data tidak ditemukan, maka fungsi akan mengembalikan null (tidak membuat kode)
        if (!$jenis || !$asal) {
            return null; 
        }

        $tanggal = now()->format('ymd'); // Mengambil tanggal hari ini dalam format YYMMDD. 
                                         // Misalnya: 2025-02-17 → 250217
        $count = Data::whereDate('created_at', now()->toDateString())->count() + 1; // Menghitung berapa banyak data yang sudah dibuat pada hari ini. 
                                                                                    // + 1 → Menentukan nomor urut data baru yang akan dibuat.

        // Menggabungkan kode dari jenis, asal, tanggal, dan nomor urut.
        // strtoupper() → Mengubah hasil menjadi huruf kapital.
        // str_pad($count, 3, '0', STR_PAD_LEFT) → Memastikan nomor urut selalu minimal 3 digit dengan menambahkan nol di depan jika perlu.
        return strtoupper("{$jenis->kode_jenis}-{$asal->kode_asal}-{$tanggal}-" . str_pad($count, 3, '0', STR_PAD_LEFT));
    }

    // relasi one to many antara jenis dan asal dengan data
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id'); // '[]' sesuai migration
    }

    public function asal()
    {
        return $this->belongsTo(Asal::class, 'asals_id');
    }

    // relasi antara sumber daya dengan data
    public function sumberDayas()
    {
        return $this->hasMany(SumberDaya::class, 'sumberdayas_id');
    }

}
