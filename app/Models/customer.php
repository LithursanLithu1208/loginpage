<?php

// namespace App\Models;


// use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable; 
// use Illuminate\Contracts\Auth\MustVerifyEmail;


// class Customer extends Authenticatable implements MustVerifyEmail
// {
//     use HasFactory;

//     protected $fillable = [
//         'name', 'email', 'password',
//     ];
//     protected $hidden = [
//         'password', 'remember_token',
//     ];
// }


namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Customer extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

