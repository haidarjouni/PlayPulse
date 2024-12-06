<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\UserFavorite;
use App\Models\UserGameList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all(); // Fetch all game
        return view('game.index', ['games' => $games]); // Pass $games to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $game = Game::find($id); // Fetch specific game
        if (!$game) {
            abort(404); // If the game is not found, show a 404 page
        }

        // Check if the user has this game in their list
        $user_list = UserGameList::userHasGame(Auth::id(), $game->id);

        $favorite_game = UserFavorite::where('favoriteable_id', $game->id) //get game id
            ->where('favoriteable_type', get_class($game)) // Dynamically determine the class of $game
            ->where('user_id', Auth::id())
            ->first();
        return view('game.show', ['game' => $game, 'user_list' => $user_list, 'favorite_game' => $favorite_game]); // Pass $game and $user_list to the view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
