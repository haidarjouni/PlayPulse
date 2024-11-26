<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'profile_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function isAdmin()
    {
        return $this->is_admin;
    }
    public function follows($followable)
    {
        return Follow::where('user_id', $this->id)
            ->where('followable_id', $followable->id)
            ->where('followable_type', get_class($followable));
    }
    public function getFollowing()
    {
        return Follow::where('user_id', $this->id)->get();  // Retrieves all followings
    }
    public function getFollowers()
    {
        // Find all Follow records where the current user is the followable entity
        return Follow::where('followable_id', $this->id)
            ->get() // Get all follow records for the current user
            ->map(function($follow) {
                return $follow->user; // Return the user who is following this user
            });
    }
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
}
