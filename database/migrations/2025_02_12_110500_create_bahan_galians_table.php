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
        Schema::create('bahan_galians', function (Blueprint $table) {
            $table->id('id_bahan');
            $table->string('kode_bahan');
            $table->string('jenis_bahan');
            $table->float('volume_bahan');
            $table->float('berat_bersih');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahan_galians');
    }
};
