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
            $table->id();
            $table->foreignId('data_id')->constrained('data')->onDelete('restrict');
            $table->enum('status', ['belum proses', 'sedang proses', 'selesai proses'])->default('belum proses')->index();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->foreignId('bahan_galians_id')->constrained('bahan_galians')->onDelete('restrict');
            $table->foreignId('mineral_pengotors_id')->constrained('mineral_pengotors')->onDelete('restrict');
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
