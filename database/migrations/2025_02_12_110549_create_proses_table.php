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
        Schema::create('proses', function (Blueprint $table) {
            $table->id('id_proses');
            $table->foreignId('id_sda')->constrained('sumber_dayas', 'id_sda')->onDelete('cascade');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->enum('status_proses', ['belum_diproses', 'sedang_diproses', 'selesai_diproses']);
            $table->foreignId('id_bahan')->constrained('bahan_galians', 'id_bahan')->onDelete('cascade');
            $table->foreignId('id_pengotor')->constrained('mineral_pengotors', 'id_pengotor')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proses');
    }
};
