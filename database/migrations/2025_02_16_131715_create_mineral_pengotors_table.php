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
        Schema::create('mineral_pengotors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_id')->constrained('jenis')->onDelete('restrict');
            $table->foreignId('asals_id')->constrained('asals')->onDelete('restrict');
            $table->float('volume');
            $table->float('berat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mineral_pengotors');
    }
};
