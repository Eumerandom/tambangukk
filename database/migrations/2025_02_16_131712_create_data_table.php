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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_id')->constrained('jenis')->onDelete('restrict');
            $table->foreignId('asals_id')->constrained('asals')->onDelete('restrict');
            $table->string('kode_sda')->unique();
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
        Schema::dropIfExists('data');
    }
};
