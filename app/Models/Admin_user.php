<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin_user extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\AdminUserFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'username',
        'role_id',
        'phone',
        'email',
        'address',
        'password',
        'gender',
        'is_active',
    ];
    protected $hidden = ['password'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}