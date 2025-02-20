<?php

namespace App\Livewire;

use App\Models\Activity;
use App\Models\Game;
use App\Models\UserGameList;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ActivityPage extends Component
{
    private $user;
    public $type = 'G' ;
    public $activities;
    public $games;
    public $playing_games;
    public function mount()
    {
        $this->user = auth()->user();
        $this->type= $this->user ? 'F' : 'G';
        $this->games = Game::orderBy('created_at', 'desc')->limit(5)->get();
        $this->loadActivities();
        $this->loadGames();
    }
    public function loadGames(){
        $this->playing_games = auth()->check()
            ? UserGameList::userGamesFilter(auth()->id(), 'playing')->get()
            : collect();
    }
    public function updatedType()
    {
        $this->loadActivities();
    }
    public function updateGameList($status, $g_id):void
    {
        Activity::create(
            [
                'user_id' => auth()->id(),
                'game_id' => $g_id,
                'activity' => $status,
            ]
        );
        UserGameList::updateOrCreate(
            ['user_id' => auth()->id(), 'game_id' => $g_id],
            ['status' => $status]
        );
        $this->loadActivities();
        $this->loadGames();
    }
    public function deleteActivity($activity_id){
        $activity = Activity::find($activity_id);
        if($activity){
            $activity->delete();
        }
        return redirect()->route("home");
    }
    public function loadActivities()
    {
        $query = Activity::with(['user', 'game'])->orderBy('created_at', 'desc');

        if ($this->type === 'F') {
            $query->whereIn('user_id', auth()->user()->getFollowingId())
                ->orWhere('user_id', auth()->id());
        }

        $this->activities = $query->get();
    }

    public function render()
    {
        return view('livewire.activity-page');
    }
}
