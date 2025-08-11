<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * Kolom yang bisa diisi mass assignment.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nim', // atau sid/lid tergantung kebutuhan
    ];

    /**
     * Kolom yang disembunyikan saat serialisasi.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting atribut ke tipe tertentu.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi ke Course (sebagai sid atau lid).
     */
    public function coursesAsSid()
    {
        return $this->hasMany(Course::class, 'sid');
    }

    public function coursesAsLid()
    {
        return $this->hasMany(Course::class, 'lid');
    }

    /**
     * Relasi ke ActivityLog.
     */
    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class, 'user_id');
    }

    /**
     * Relasi ke Notification.
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }

    /**
     * Relasi ke QuizAnswer.
     */
    public function quizAnswers()
    {
        return $this->hasMany(QuizAnswer::class, 'user_id');
    }

    /**
     * Relasi ke ForumComment.
     */
    public function forumComments()
    {
        return $this->hasMany(ForumComment::class, 'user_id');
    }

    /**
     * Relasi ke Forum.
     */
    public function forums()
    {
        return $this->hasMany(Forum::class, 'user_id');
    }

    /**
     * Relasi ke LearningProgress.
     */
    public function learningProgress()
    {
        return $this->hasMany(LearningProgress::class, 'id_user');
    }

    /**
     * Relasi ke Submission.
     */
    public function submissions()
    {
        return $this->hasMany(Submission::class, 'user_id');
    }
}
