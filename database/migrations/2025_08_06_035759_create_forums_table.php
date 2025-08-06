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
        Schema::create('forums', function (Blueprint $table) {
            $table->id('id_forum'); // Primary Key
            $table->unsignedBigInteger('id_course'); // Foreign Key ke courses
            $table->unsignedBigInteger('id_user');   // Foreign Key ke users
            $table->string('title', 150);            // Judul diskusi
            $table->timestamp('created_at')->useCurrent(); // Tanggal buat

            // Foreign Key Constraints
            $table->foreign('id_course')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forums');
    }
};
