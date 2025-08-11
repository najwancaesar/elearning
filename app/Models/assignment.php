<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = 'assignments';

    protected $fillable = [
        'course_materials_id',
        'title',
        'instruction',
        'due_date',
        'file_required'
    ];

    /**
     * Relasi ke CourseMaterial
     * Satu assignment milik satu course material
     */
    public function courseMaterial()
    {
        return $this->belongsTo(CourseMaterial::class, 'course_materials_id');
    }

    /**
     * Relasi ke Submission
     * Satu assignment memiliki banyak submission
     */
    public function submissions()
    {
        return $this->hasMany(Submission::class, 'assignment_id');
    }
}
