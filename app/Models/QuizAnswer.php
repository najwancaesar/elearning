<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    protected $table = 'quiz_answers';

    protected $fillable = [
        'question_id',
        'user_id',
        'answer',
        'is_correct',
        'submitted_at'
    ];

    /**
     * Relasi ke QuizQuestion
     * Satu jawaban terkait satu pertanyaan
     */
    public function question()
    {
        return $this->belongsTo(QuizQuestion::class, 'question_id');
    }

    /**
     * Relasi ke User
     * Satu jawaban dibuat oleh satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
