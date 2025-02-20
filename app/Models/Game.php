<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';
    protected $fillable = ['title','name', 'profile_image', 'description', 'format', 'duration', 'status', 'dev_date', 'release_date','created_at','updated_at'];
    // Relationship to Characters
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'game_voice_actor_character', 'game_id', 'character_id')
            ->withPivot('role'); // Include the 'role' field from the pivot table
    }

    // Relationship to Voice Actors
    public function voiceActors()
    {
        return $this->belongsToMany(VoiceActor::class, 'game_voice_actor_character', 'game_id', 'voice_actor_id');
    }

    public function voiceActorForCharacter($gameId, $characterId)
    {
        return $this->voiceActors()
            ->wherePivot('game_id', $gameId)  // Filter by game_id
            ->wherePivot('character_id', $characterId)  // Filter by character_id
            ->first();
    }
    public function getGender(){
        return $this->gender ? 'male' : 'female';
    }
    public function genres(){
        return $this->belongsToMany(Genre::class, 'game_genres', 'game_id', 'genre_id');
    }

    public function sequels()
    {
        return $this->belongsToMany(Game::class, 'sequels_prequels', 'game_id_prequel', 'game_id_sequel')->withTimestamps();
    }

    public function prequels()
    {
        return $this->belongsToMany(Game::class, 'sequels_prequels', 'game_id_sequel', 'game_id_prequel')->withTimestamps();
    }


}
