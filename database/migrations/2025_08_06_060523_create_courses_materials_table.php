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
        Schema::create('courses_materials', function (Blueprint $table) {
            $table->id('id_material');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->varchar('title');
            $table->varchar('type');
            $table->varchar('file_url');
            $table->timestamp('uploaded_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_materials');
    }
};
