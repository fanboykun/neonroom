<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'semester_id',
    ];

    function semester()
    {
        return $this->belongsTo('App\Models\Semester');
    }

    public function studies()
    {
        return $this->belongsToMany(Study::class)->using(Schedule::class)->withTimestamps();
    }
}
