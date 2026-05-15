<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role', 'status', 'phone', 'address', 'city', 'state', 'zip', 'country', 'timezone'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // check if the user is admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // check if the user is user
    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    // check if the user is active
    public function isActive(): bool
    {
        return $this->status == 1;
    }

    // check if the user is inactive
    public function isInactive(): bool
    {
        return $this->status == 0;
    }
}
