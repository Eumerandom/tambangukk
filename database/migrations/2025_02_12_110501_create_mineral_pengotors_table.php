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
            $table->id('id_pengotor');
            $table->string('jenis_pengotor');
            $table->float('volume_pengotor');
            $table->float('berat_pengotor');
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
