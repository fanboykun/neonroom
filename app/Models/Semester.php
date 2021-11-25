<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'academic_year_id'
    ];

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->using(Status::class)->withTimestamps();
    }
}
