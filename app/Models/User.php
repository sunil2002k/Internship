<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class User extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

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

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
