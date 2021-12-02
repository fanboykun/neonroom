<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecturer_id',
        'name',
        'study',
        'hour',
        'year_id',
        'semester',
        'description',
    ];

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function days()
    {
        return $this->belongsToMany(Day::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }
}
