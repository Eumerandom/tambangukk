<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('processings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('jenis_mineral');
            $table->time('tgl_masuk_proses');
            $table->time('tgl_selesai_proses');
            $table->string('status_proses');
            $table->float('berat_kotor');
            $table->float('berat_bersih');
            $table->string('jenis_limbah');
            $table->float('berat_limbah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processings');
    }
};
