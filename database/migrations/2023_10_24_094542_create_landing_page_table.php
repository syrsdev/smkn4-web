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
        Schema::create('hero_section', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->text('value');
            $table->timestamps();
        });

        Schema::create('sambutan_kepsek', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('konten');
            $table->unsignedBigInteger('id_kepsek');
            $table->foreign('id_kepsek')
                ->references('id')
                ->on('tenaga_pendidik')
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
        Schema::dropIfExists('hero_section');
        Schema::dropIfExists('sambutan_kepsek');
    }
};
