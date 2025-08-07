<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id('submission_id');

            // Kolom assignment_id, foreign key ke id_assignment
            $table->unsignedBigInteger('assignment_id');
            $table->foreign('assignment_id')->references('id_assignment')->on('assignments')->onDelete('cascade');

            // Kolom user_id, foreign key ke users(id)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('file_url');
            $table->timestamp('submitted_at')->nullable();
            $table->float('grade')->nullable();
            $table->text('feedback')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
