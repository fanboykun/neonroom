<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'question',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('answer')->withTimestamps();
    }
}
