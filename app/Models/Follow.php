<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'user_follows';
    protected $fillable = ['user_id', 'followable_id', 'followable_type','favorite'];
    use HasFactory;
    public function user()
    { // Get the user who is doing the follow (follower)
        return $this->belongsTo(User::class, 'user_id');
    }
    public function followable() // this is used to get the followed entity (following)
    {
        return $this->morphTo();
    }
}
