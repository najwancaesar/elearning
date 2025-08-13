<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forums';

    protected $fillable = [
        'course_id',
        'user_id',
        'title',
        'created_at'
    ];

    /**
     * Relasi ke Course
     * Satu forum milik satu course
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * Relasi ke User
     * Satu forum dibuat oleh satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke ForumComment
     * Satu forum bisa memiliki banyak komentar
     */
    public function comments()
    {
        return $this->hasMany(ForumComment::class, 'forum_id');
    }
}
