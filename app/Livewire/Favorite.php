<?php

namespace App\Livewire;

use App\Models\Game;
use App\Models\User;
use App\Models\UserFavorite;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Favorite extends Component
{
    public $user;
    public $game_info;
    public $favorite_list;
    public $top;
    public $left;

//    public function updateTooltipPosition($top, $left)
//    {
//        // Update the position properties
//        $this->top = $top;
//        $this->left = $left;
//    }

    public function mount($user){
        $this->user = $user;
    }
    public function deleteFavorite($gameID){
        UserFavorite::where([
            'user_id' => Auth::id(),
            'favoriteable_id' => $gameID,
            'favoriteable_type' => Game::class,
        ])->delete();
    }
    public function showToolTip($id){
        $this->game_info = $this->user->getFavoriteId($id);

    }
    public function render()
    {
        return view('livewire.favorite');
    }
}
