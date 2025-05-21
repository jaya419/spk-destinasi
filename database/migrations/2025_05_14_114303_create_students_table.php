<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
Schema::create('students', function (Blueprint $table) {
    $table->id();
    $table->string('name');       // Nama siswa
    $table->string('class')->nullable();   // Kelas siswa
    $table->text('description')->nullable(); // Deskripsi tambahan
    $table->timestamps();
});

    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
