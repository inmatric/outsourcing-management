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
        Schema::create('item_found', function (Blueprint $table) {
            $table->id();
            $table->string('find_name', 50);
            $table->string('item_name', 100);
            $table->string('found_location', 50);
            $table->date('found_date');
            $table->string('telephone', 15);
            $table->string('photo', 255)->nullable();
            $table->enum('status', ['already taken', 'not taken']);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_found');
    }
};
