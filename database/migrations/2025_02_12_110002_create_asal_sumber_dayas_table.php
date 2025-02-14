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
        Schema::create('asal_sumber_dayas', function (Blueprint $table) {
            $table->id('id_asal');
            $table->string('nama_asal');
            $table->string('kode_asal', 5)->uppercase(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asal_sumber_dayas');
    }
};
