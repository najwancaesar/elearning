<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $table = 'quiz_questions';

    protected $fillable = [
        'quiz_id',
        'question_text',
        'type',
        'options',
        'correct_answer'
    ];

    /**
     * Relasi ke Quiz
     * Satu pertanyaan milik satu kuis
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    /**
     * Relasi ke QuizAnswer
     * Satu pertanyaan bisa memiliki banyak jawaban
     */
    public function answers()
    {
        return $this->hasMany(QuizAnswer::class, 'question_id');
    }
}
