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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('slug')
                ->unique();
            $table->string('judul');
            $table->enum('kategori', ['agenda', 'artikel', 'berita', 'event']);
            $table->text('konten');
            $table->string('gambar')
                ->nullable()
                ->default('no-image-43.png');
            $table->enum('status', ['0', '1'])
                ->nullable()
                ->default('0');
            $table->unsignedBigInteger('id_penulis');
            $table->foreign('id_penulis')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();
            $table->string('slug')
                ->unique();
            $table->string('judul');
            $table->enum('kategori', ['kota', 'provinsi', 'nasional', 'internasional']);
            $table->text('konten');
            $table->string('pemenang')
                ->nullable();
            $table->string('gambar')
                ->nullable()
                ->default('no-image-43.png');
            $table->enum('status', ['0', '1'])
                ->nullable()
                ->default('0');
            $table->unsignedBigInteger('id_penulis');
            $table->foreign('id_penulis')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('post');
        Schema::dropIfExists('prestasi');
    }
};
