<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Schedule extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected $fillable = [
        'study_id',
        'room_id',
        'user_id',
        'day',
        'time',
    ];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
