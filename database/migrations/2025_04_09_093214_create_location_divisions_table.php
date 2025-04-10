<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('location_divisions', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->string('company');
            $table->string('location');
            $table->string('work_type');
            $table->text('work_detail')->nullable();
            $table->enum('status', ['completed', 'in_progress'])->default('in_progress');
            $table->timestamps();
            // $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            // $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            // $table->foreignId('work_id')->constrained('works')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_divisions');
    }
};
