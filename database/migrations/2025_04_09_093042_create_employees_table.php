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
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // primary key
            $table->unsignedBigInteger('user_id'); // tidak ada foreign key
            $table->string('name', 200);
            $table->text('address');
            $table->string('age'); // atau bisa pakai integer
            $table->string('phone_number', 15);
            $table->string('card_id', 255);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
