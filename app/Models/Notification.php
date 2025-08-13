<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'user_id',
        'title',
        'message',
        'is_read',
        'sent_at'
    ];

    /**
     * Relasi ke User
     * Satu notifikasi milik satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
