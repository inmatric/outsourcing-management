<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('worktools', function (Blueprint $table) {
            // Primary key
            $table->id();

            // Nama item
            $table->string('name', 50);

            // Deskripsi item
            $table->text('description');

            // Tujuan penggunaan item
            $table->text('purpose');

            // Path/lokasi gambar (direkomendasikan menyimpan path bukan file binary)
            $table->string('image', 255)->nullable();

            // Timestamps otomatis
            $table->timestamps();

            // Index untuk kolom yang sering dicari
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('worktools');
    }
};
