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
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // ✅ Gunakan default ID (bigint unsigned auto_increment)
            $table->string('title');
            $table->text('description');
            $table->string('duration');
            $table->string('category');
            $table->integer('sid')->unsigned();
            $table->integer('lid')->unsigned();


            $table->foreign('sid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lid')->references('id')->on('users')->onDelete('cascade');

            $table->string('access_level');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
