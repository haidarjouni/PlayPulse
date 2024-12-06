<?php

namespace App\Livewire;

use App\Models\Game;
use App\Models\User;
use App\Models\UserFavorite;
use App\Models\UserGameList;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ModalForum extends Component
{
    public $status;
    public $score = 0;
    public $note;
    public $start_date;
    public $finish_date;
    public $total_replay = 0;
    public function refreshFav(){
        $this->favorite_game = UserFavorite::where('user_id', Auth::id())
            ->where('favoriteable_id', $this->game->id)
            ->where('favoriteable_type', Game::class)
            ->first();
    }
    public function toggleFavorite()
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        if ($this->favorite_game) {
            $this->favorite_game->delete();
        }else{
            UserFavorite::create([
                'user_id' => Auth::id(),
                'favoriteable_id' => $this->game->id,
                'favoriteable_type' => Game::class,
            ]);
        }
        $this->refreshFav();
    }

    public function update()
    {
        $this->user_list->update([
            'user_id' => Auth::id(),
            'game_id' => $this->game->id,
            'status' => $this->status,
            'score' => $this->score,
            'note' => $this->note,
            'total_replay' => $this->total_replay,
            'start_date' => $this->start_date,
            'finish_date' => $this->finish_date,
        ]);

    }

    // Create method to create a new user game list entry
    public function create()
    {
        UserGameList::create([
            'user_id' => Auth::id(),
            'game_id' => $this->game->id,
            'status' => $this->status,
            'score' => $this->score,
            'note' => $this->note,
            'total_replay' => $this->total_replay,
            'start_date' => $this->start_date,
            'finish_date' => $this->finish_date,
        ]);
    }

    // Submission method to validate and either update or create
    public function submission()
    {
        if (!Auth::check()) {
            return;
        }

        $this->validate([
            'status' => 'required|string',
            'score' => 'nullable|integer|min:0|max:100',
            'note' => 'nullable|string',
            'start_date' => 'required|date',
            'finish_date' => 'nullable|date',
            'total_replay' => 'nullable|integer|min:0',
        ]);

        if ($this->user_list) {
            // Call the update method if the user already has a list
            $this->update();
        } else {
            // Call the create method if no list exists for the user
            $this->create();
        }
        return redirect(request()->header('Referer'));
    }

    // Mount method to initialize properties
    public $game;

    public $user_list;
    public $favorite_game;
    public function mount($game, $user_list, $favorite_game)
    {
        $this->game = $game;
        $this->user_list = $user_list;
        if ($user_list) {
            $this->status = $user_list->status;
            $this->score = $user_list->score;
            $this->note = $user_list->note;
            $this->total_replay = $user_list->total_replay;
            $this->start_date = $user_list->start_date;
            $this->finish_date = $user_list->finish_date;
        }
        $this->favorite_game = $favorite_game;
    }

    public function render()
    {
        return view('livewire.modal-forum');
    }
}

