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
Schema::create('penilaians', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('student_id');
    $table->unsignedBigInteger('criteria_id');
    $table->float('value'); // Nilai skor
    $table->timestamps();

    $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
    $table->foreign('criteria_id')->references('id')->on('criterias')->onDelete('cascade');
    $table->unique(['student_id', 'criteria_id']); // agar satu siswa tidak memiliki nilai ganda di satu kriteria
});

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recomendasis');
    }
};
