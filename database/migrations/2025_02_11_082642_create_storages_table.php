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
        Schema::create('storages', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('jenis_mineral');
            $table->float('berat_bersih');
            $table->string('jenis_limbah');
            $table->float('berat_limbah');
            $table->time('tgl_masuk_storage');
            $table->time('tgl_selesai_storage');
            $table->string('tujuan_distribusi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storages');
    }
};
