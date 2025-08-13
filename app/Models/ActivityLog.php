<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';

    protected $fillable = [
        'user_id',
        'activity',
        'timestamp'
    ];

    /**
     * Relasi ke User
     * Satu log aktivitas milik satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
