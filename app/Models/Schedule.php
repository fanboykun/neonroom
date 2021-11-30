<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'user_id',
        'title',
        'type',
        'meet_for'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function task()
    {
        return $this->hasOne(Task::class);
    }

    public function content()
    {
        return $this->hasOne(Content::class);
    }

    public function presence()
    {
        return $this->hasOne(Presence::class);
    }
}
