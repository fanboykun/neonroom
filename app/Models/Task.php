<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'explanation',
        'is_attachable',
        'schedule_id',
        'due_time',
    ];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function appraisals()
    {
        return $this->hasMany(Appraisal::class);
    }
}
