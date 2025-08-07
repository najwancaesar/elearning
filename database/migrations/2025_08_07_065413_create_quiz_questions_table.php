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
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id(); // Lebih baik pakai default "id" saja
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade');
            $table->text('question_text'); // Soal
            $table->string('type'); // Misalnya: multiple_choice, true_false
            $table->json('option')->nullable(); // ✅ Simpan pilihan dalam bentuk JSON
            $table->string('correct_answer'); // Jawaban benar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_questions');
    }
};
