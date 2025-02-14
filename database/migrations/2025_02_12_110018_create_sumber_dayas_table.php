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
        Schema::create('sumber_dayas', function (Blueprint $table) {
            $table->id('id_sda');
            $table->foreignId('id_jenis')->constrained('jenis_sumber_dayas','id_jenis')->onDelete('cascade');
            $table->foreignId('id_asal')->constrained('asal_sumber_dayas','id_asal')->onDelete('cascade');
            $table->string('kode_sda');
            $table->float('volume_sda');
            $table->float('berat_kotor');
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sumber_dayas');
    }
};
