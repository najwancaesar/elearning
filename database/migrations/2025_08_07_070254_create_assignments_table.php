<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id('id_assignment'); // PRIMARY KEY bukan default 'id'
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('instructions');
            $table->dateTime('due_date');
            $table->boolean('file_required');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
