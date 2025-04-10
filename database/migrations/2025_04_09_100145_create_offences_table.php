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
        Schema::create('offences', function (Blueprint $table) {
            $table->id();
            $table->string('employe_name');
            $table->string('date');
            $table->string('offence_category');
            $table->string('offence_description');
            $table->string('image');
            $table->timestamps();

            // $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offences');
    }
};
