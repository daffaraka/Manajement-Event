<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEO extends Model
{
    protected $table = 'usereo';
    protected $primary = 'id';
    protected $guarded = 'id';

    protected $fillable = [
        'name',
        'nomorhp',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

