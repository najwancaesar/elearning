<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    protected $table = 'forum_comments';

    protected $fillable = [
        'forum_id',
        'user_id',
        'comment',
        'created_at'
    ];

    /**
     * Relasi ke Forum
     * Satu komentar milik satu forum
     */
    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum_id');
    }

    /**
     * Relasi ke User
     * Satu komentar ditulis oleh satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
