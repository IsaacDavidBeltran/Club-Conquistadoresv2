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
        Schema::create('clase_xalumno', function (Blueprint $table) {
            $table->foreignId('clase_id')->references('id')->on('clase');
            $table->foreignId('conquistador')->references('id')->on('conquistador');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clase_xalumno');
    }
};
