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
        Schema::create('ovqat_masalliqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ovqat_id')->constrained('ovqats')->onDelete('cascade');
            $table->foreignId('masalliq_id')->constrained('masalliqs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ovqat_masalliqs');
    }
};
