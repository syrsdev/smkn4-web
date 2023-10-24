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
        Schema::create('ekskul', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('link_sosmed')
                ->nullable();
            $table->string('gambar')
                ->nullable()
                ->default('no-image-11.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekskul');
    }
};
