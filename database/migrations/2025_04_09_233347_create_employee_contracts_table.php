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
        Schema::create('employee_contracts', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id', 50); // Atau bisa pakai foreignId jika relasi ke tabel employees
            $table->string('contract_number', 100);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('position', 100);
            $table->unsignedBigInteger('location_id');
            $table->string('working_hours', 50);
            $table->string('salary', 255);
            $table->enum('status', ['active', 'inactive', 'terminated'])->default('active');
            $table->string('contract_file', 255)->nullable();
            $table->timestamps();

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_contracts');
    }
};
