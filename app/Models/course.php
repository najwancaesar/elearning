<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Nama tabel (opsional kalau default plural-nya sudah benar)
    protected $table = 'courses';

    // Kolom yang bisa diisi mass assignment
    protected $fillable = [
        'title',
        'description',
        'duration',
        'category',
        'sid',
        'lid',
        'access_level',
        'created_at'
    ];

    // Relasi: Course punya banyak CourseMaterial
    public function courseMaterials()
    {
        return $this->hasMany(CourseMaterial::class, 'course_id');
    }

    // Relasi: Course punya banyak Forum
    public function forums()
    {
        return $this->hasMany(Forum::class, 'course_id');
    }

    // Relasi: Course punya banyak Quiz
    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'course_id');
    }

    // Relasi: Course punya banyak Learning Progress
    public function learningProgress()
    {
        return $this->hasMany(LearningProgress::class, 'id_course');
    }

    // Relasi ke User (sebagai pemilik / pengajar)
    public function userSid()
    {
        return $this->belongsTo(User::class, 'sid');
    }

    public function userLid()
    {
        return $this->belongsTo(User::class, 'lid');
    }
}
