<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->date('evaluation_date');
            $table->string('information', 200);
            $table->timestamps();

            // Index
            $table->index('employee_id');
            $table->index('evaluation_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_evaluations');
    }
};
