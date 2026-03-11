<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAdmin extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users_admin';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'number',
        'password',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * Hash password otomatis
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}