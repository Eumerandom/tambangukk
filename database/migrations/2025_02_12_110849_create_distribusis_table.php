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
        Schema::create('distribusis', function (Blueprint $table) {
            $table->id('id_distribusi');
            $table->foreignId('id_bahan')->constrained('bahan_galians')->onDelete('cascade');
            $table->foreignId('id_pengotor')->constrained('mineral_pengotors')->onDelete('cascade');
            $table->timestamps('tgl_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribusis');
    }
};
