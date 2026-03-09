<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }

    public function moods()
    {
        return $this->hasMany(Mood::class);
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }

    public function gratitudeJars()
    {
        return $this->hasMany(GratitudeJar::class);
    }
    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
