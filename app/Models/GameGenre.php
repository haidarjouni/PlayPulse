<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameGenre extends Model
{
    protected $table = 'game_genres';
    protected $fillable = ['game_id', 'genre_id'];
    public function game(){
        return $this->belongsTo(Game::class, 'game_id');
    }
    public function genre(){
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
