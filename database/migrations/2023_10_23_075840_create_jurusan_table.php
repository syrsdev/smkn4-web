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
        Schema::create('bidang_keahlian', function (Blueprint $table) {
            $table->id();
            $table->string('slug')
                ->unique();
            $table->string('nama');
            $table->timestamps();
        });

        Schema::create('program_keahlian', function (Blueprint $table) {
            $table->id();
            $table->string('slug')
                ->unique();
            $table->string('nama');
            $table->unsignedBigInteger('id_bidang');
            $table->foreign('id_bidang')
                ->references('id')
                ->on('bidang_keahlian')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('konsentrasi_keahlian', function (Blueprint $table) {
            $table->id();
            $table->string('slug')
                ->unique();
            $table->string('nama');
            $table->text('deskripsi');
            $table->text('gambar')
                ->nullable()
                ->default('no-image-169.png');
            $table->unsignedBigInteger('id_program');
            $table->foreign('id_program')
                ->references('id')
                ->on('program_keahlian')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidang_keahlian');
        Schema::dropIfExists('program_keahlian');
        Schema::dropIfExists('konsentrasi_keahlian');
    }
};
