<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    protected $table = 'characters';
    protected $fillable = ['name','gender','profile_image','height','age'];
    public function games(){
        return $this->belongsToMany(Game::class, 'game_voice_actor_character', 'character_id', 'game_id');
    }
    public function voiceActors(){
        return $this->belongsToMany(VoiceActor::class, 'game_voice_actor_character', 'character_id', 'voice_actor_id');
    }
}
