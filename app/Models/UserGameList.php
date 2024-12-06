<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGameList extends Model
{
    use HasFactory;
    protected $table = 'user_game_lists';
    protected $fillable = ['user_id', 'game_id','status','score','start_date','finish_date','total_replay','note'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function game(){
        return $this->belongsTo(Game::class);
    }
    public static  function userHasGame($user_id, $game_id)
    {
        return UserGameList::where('user_id', $user_id)
            ->where('game_id', $game_id)
            ->first(); // Use first() to get a single result, or get() to fetch a collection
    }
    public static function userGamesFilter($filter, $user_id)
    {
        return self::where('user_id', $user_id)
            ->where('status', $filter)
            ->get(); // Use get() instead of find() for a collection
    }

}
