<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use  HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'fullname',
        'age',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getFullNameAttribute()
    {
        return strtoupper($this->name) . " " . strtoupper($this->lastname);
    }

    public function setAgeAttribute($age)
    {
        $this->attributes['age'] = $age < 18
        ? 'Menor de edad'
        : $age;
    }
    
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = strtolower($name);
    }

    public function setLastNameAttribute($lastname)
    {
        $this->attributes['lastname'] = strtolower($lastname);
    }
}
