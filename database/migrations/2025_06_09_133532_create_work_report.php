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
        Schema::create('work_report', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('employee_name', 200);
            $table->date('date');
            $table->text('work_description');
            $table->text('problem_found');
            $table->text('action');
            $table->string('image', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_report');
    }
};
