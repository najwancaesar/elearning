<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseMaterial extends Model
{
    protected $table = 'course_materials';

    protected $fillable = [
        'course_id',
        'title',
        'type',
        'file_url',
        'uploaded_at'
    ];

    /**
     * Relasi ke Course
     * Satu course material milik satu course
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * Relasi ke Assignment
     * Satu course material bisa punya banyak assignment
     */
    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'course_materials_id');
    }
}
