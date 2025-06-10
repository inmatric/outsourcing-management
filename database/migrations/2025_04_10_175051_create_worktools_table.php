<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorktoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worktools', function (Blueprint $table) {
            $table->id();
            $table->string('name');           // Nama alat kerja
            $table->text('description');      // Deskripsi alat kerja
            $table->string('purpose');        // Tujuan alat kerja
            $table->string('image')->nullable(); // Gambar alat
            $table->timestamps();            // Timestamp (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worktools');
    }
}
