<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ownedRoom()
    {
        return $this->hasMany(Room::class, 'lecturer_id', 'id');
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class)->withTimestamps();
    }

    public function assignments()
    {
        return $this->belogsToMany(Assignment::class)->withPivot('answer')->withTimestamps();
    }

    public function presences()
    {
        return $this->belongsToMany(Presence::class)->withPivot('checked_at');
    }

    public function appraisals()
    {
        return $this->hasMany(Appraisal::class);
    }
}
