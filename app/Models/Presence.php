<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'due_hour',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('checked_at');
    }
}
