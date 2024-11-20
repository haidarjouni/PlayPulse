<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoiceActor extends Model
{
    use HasFactory;
    protected $table = 'voice_actors';
    protected $fillable = ['name','age','gender','profile_image'];

    public function games(){
        return $this-> belongsToMany(Game::class,'game_voice_actor_character','actor_id','game_id');
    }
    public function characters(){
        return $this->belongsToMany(Character::class,'game_voice_actor_character','actor_id','character_id');
    }
}
