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
        Schema::create('stone_piles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bahan_galians_id')->constrained('bahan_galians')->onDelete('restrict');
            $table->foreignId('mineral_pengotors_id')->constrained('mineral_pengotors')->onDelete('restrict');
            $table->string('kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stone_piles');
    }
};
