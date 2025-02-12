<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Game;
use App\Models\UserGameList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function updateGameList(Request $request, $Gid)
    {
        // Validate status before querying the database
        $request->validate([
            'status' => 'required|in:' . implode(',', \App\Enums\UserGameStatus::values()),
        ]);

        // Find the user's game in their list
        $userGame = UserGameList::where('user_id', auth()->id())
            ->where('game_id', $Gid)
            ->first();

        if (!$userGame) {
            return redirect()->back()->with('error', 'Game not found in your list.');
        }

        // Update the status in UserGameList
        $userGame->update([
            'status' => $request->input('status')
        ]);

        // Get the most recent activity for this game
        $activity = Activity::where('game_id', $Gid)
            ->where('user_id', auth()->id())
            ->latest() // Order by latest created_at
            ->first();

        // If no activity exists or the last activity's status is different, create a new entry
        if (!$activity || $activity->status !== $request->input('status')) {
            Activity::create([
                'user_id' => auth()->id(),
                'game_id' => $Gid,
                'status' => $request->input('status')
            ]);
        }

        return redirect()->back()->with('success', 'Game status updated successfully!');
    }
}
