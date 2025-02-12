<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class Activity extends Model
{
    protected $table = 'activities';
    protected $fillable = ['game_id', 'user_id', 'activity'];

    public function game():belongsTo
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
    public function user():belongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getActivityFriends()
    {
        $followerIds = auth()->user()->getFollowersId();
        $followerIds[] = auth()->id(); // Add the authenticated user's ID

        return Activity::whereIn('user_id', $followerIds)->get();
    }
    public static  function  createActivity($activity, $g_id):void
    {
        Activity::updateOrCreate(
            ['user_id' => auth()->id(), 'game_id' => $g_id], // SEARCH
            ['activity' => $activity] // Fields to update
        );
    }
}
