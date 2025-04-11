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
        Schema::create('offences', function (Blueprint $table) {
            // ID dan timestamp standar
            $table->id();
            $table->timestamps();

            // Relasi ke tabel employees
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');

            // Tanggal pelanggaran
            $table->date('date');

            // Kategori pelanggaran
            $table->string('offence_category', 50);

            // Deskripsi pelanggaran
            $table->string('offence_description', 100);

            // Gambar bukti pelanggaran
            $table->binary('image')->nullable();

            // Index untuk performa query
            $table->index('employee_id');
            $table->index('date');
            $table->index('offence_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('offences');
    }
};
