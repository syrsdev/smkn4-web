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
        Schema::create('mapel', function (Blueprint $table) {
            $table->id();
            $table->string('slug')
                ->unique();
            $table->string('nama');
            $table->timestamps();
        });

        Schema::create('tenaga_pendidik', function (Blueprint $table) {
            $table->id();
            $table->string('slug')
                ->unique();
            $table->string('nama');
            $table->enum('bagian', ['pendidik', 'kependidikan', 'kepsek'])
                ->nullable();
            $table->enum('sub_bagian', ['guru', 'staff', 'kepsek'])
                ->nullable();
            $table->string('gambar')
                ->nullable()
                ->default('/images/default/no-image-34.png');
            $table->unsignedBigInteger('id_mapel')
                ->nullable();
            $table->foreign('id_mapel')
                ->nullable()
                ->references('id')
                ->on('mapel')
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
        Schema::dropIfExists('mapel');
        Schema::dropIfExists('tenaga_pendidik');
    }
};
