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
        Schema::create('jenis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis')->unique();
            $table->string('kode_jenis', 5)->uppercase()->unique();
            $table->json('kategori')->nullable(); // menggunakan JSON untuk menyimpan array kategori
            // $table->enum('kategori', ['sumber daya', 'bahan galian', 'limbah pengotor'])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis');
    }
};
