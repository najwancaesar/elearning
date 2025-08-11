<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizzes';

    protected $fillable = [
        'course_id',
        'title',
        'type',
        'start_time',
        'end_time'
    ];

    /**
     * Relasi ke Course
     * Satu kuis milik satu course
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * Relasi ke QuizQuestion
     * Satu kuis memiliki banyak pertanyaan
     */
    public function questions()
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_id');
    }
}
