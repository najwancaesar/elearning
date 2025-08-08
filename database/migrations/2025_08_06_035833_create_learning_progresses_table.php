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
            $table->id('id_progress');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_course')->constrained('courses')->onDelete('cascade');
            $table->float('score_avg');
            $table->boolean('warning_flag')->default(false);
            $table->timestamp('last_updated')->useCurrent();
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
