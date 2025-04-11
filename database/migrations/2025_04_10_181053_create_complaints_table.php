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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_name', 255);
            $table->string('customer_phone', 255);
            $table->text('description');
            $table->string('proof_image', 255)->nullable();
            $table->enum('status', ['pending', 'processed', 'resolved', 'rejected'])->default('pending');
            // Foreign key to complaint_resolutions table for status

            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');

            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');

            $table->timestamps(); // This creates both created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
