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
            $table->id('id_forum'); // Primary key forums
            $table->unsignedBigInteger('id_course'); // FK ke courses.id
            $table->unsignedBigInteger('id_user');   // FK ke users.id
            $table->string('title', 150); // Judul diskusi
            $table->timestamp('created_at')->useCurrent(); // Tanggal buat

            // Perbaikan foreign key
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
