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
        Schema::create('learning_progresses', function (Blueprint $table) {
            $table->id('id_progress'); // Primary key
            $table->unsignedBigInteger('id_user');   // FK ke users
            $table->unsignedBigInteger('id_course'); // FK ke courses
            $table->float('score_avg');              // Rata-rata nilai
            $table->boolean('warning_flag')->default(false); // Bendera performa buruk
            $table->timestamp('last_updated')->useCurrent(); // Terakhir diperbarui

            // Foreign key constraints
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_course')->references('id_course')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_progresses');
    }
};
