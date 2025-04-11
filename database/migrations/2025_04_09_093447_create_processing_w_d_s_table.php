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
        Schema::create('processing_w_d_s', function (Blueprint $table) {
            // ID dan Relasi
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');

            // Timer Tracking
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->integer('duration_sec')->nullable()->comment('Durasi dalam detik');

            // Dokumentasi Foto
            $table->string('photo_before_path')->nullable();
            $table->string('photo_after_path')->nullable();

            // Status dan Catatan
            $table->enum('status', ['pending', 'inprogress', 'completed'])->default('pending');
            $table->text('notes')->nullable();

            // Timestamps
            $table->timestamps();

            // Index untuk performa
            $table->index('employee_id');
            $table->index('status');
            $table->index(['start_time', 'end_time']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processing_w_d_s');
    }
};
