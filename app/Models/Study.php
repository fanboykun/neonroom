<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'semester_id'
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class)->using(Schedule::class)->withTimestamps();
    }
}
