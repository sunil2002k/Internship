<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
   use HasFactory, Notifiable;

    // Add referrer_id and age to fillable fields
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'referrer_id', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relationship: Get the user who referred this user
    public function referrer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }
}
