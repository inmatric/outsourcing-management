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
        Schema::create('work_equipment', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id', 50);
            $table->string('position', 255);
            $table->string('location', 255);
            $table->string('equipment', 255);
            $table->enum('condition', ['good', 'fair', 'damaged']);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_equipment');
    }
};
