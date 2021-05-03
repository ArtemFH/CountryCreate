<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    public $timestamps = false;

    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'password',
        'gender_id',
        'role_id',
        'age',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
