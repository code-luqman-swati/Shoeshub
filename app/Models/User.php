<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Role;


class User extends Authenticatable
{
    use Hasfactory,Notifiable;

    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'phone',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'status' => 'boolean',
        ];
    }

    public function role()
{
    return $this->belongsTo(Role::class);
}


public function hasPermission(string $permission): bool
{
    if (!$this->role) {
        return false;
    }

    return $this->role->permissions()
        ->where('slug', $permission)
        ->exists();
}

}