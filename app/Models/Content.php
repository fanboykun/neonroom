<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Content extends Model
{
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'schedule_id',
        'body',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
