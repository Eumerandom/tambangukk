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
        Schema::create('stope_piles', function (Blueprint $table) {
            $table->id('id_stope');
            $table->foreignId('id_bahan')->constrained('bahan_galians')->onDelete('cascade');
            $table->foreignId('id_pengotor')->constrained('mineral_pengotors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stope_piles');
    }
};
