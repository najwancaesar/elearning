<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningProgress extends Model
{

    // Sesuaikan dengan nama tabel di database
    protected $table = 'LearningProgress';

    protected $fillable = [
        'id_user',
        'id_course',
        'score_avg',
        'warning_flag',
        'last_update'
    ];

    /**
     * Relasi ke User
     * Satu progress milik satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Relasi ke Course
     * Satu progress terkait dengan satu course
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'id_course');
    }
}
