<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Morilog\Jalali\Jalalian;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'level',
        'name',
        'email',
        'mobile',
        'password',
        'is_active',
        'login_at'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function login_at()                       {return Jalalian::forge($this->login_at)->format('H:i   %d-%B-%Y');}
    public function created_at()                     {return Jalalian::forge($this->created_at)->format('H:i   %d-%B-%Y');}
}
