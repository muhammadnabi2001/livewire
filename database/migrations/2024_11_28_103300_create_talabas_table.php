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
        Schema::create('talabas', function (Blueprint $table) {
            $table->id();
            $table->string('fio');
            $table->string('manzil');
            $table->integer('yosh');
            $table->string('yunalish');
            $table->integer('kurs');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talabas');
    }
};