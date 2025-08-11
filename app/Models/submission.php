<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = 'submissions';

    protected $fillable = [
        'assignment_id',
        'user_id',
        'file_url',
        'submitted_at',
        'grade',
        'feedback'
    ];

    /**
     * Relasi ke Assignment
     * Satu submission milik satu assignment
     */
    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'assignment_id');
    }

    /**
     * Relasi ke User
     * Satu submission dibuat oleh satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
