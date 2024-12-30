<?php

namespace App\Livewire;

use App\Enums\UserGameStatus;
use App\Models\UserGameList;
use Livewire\Component;

class GameSearch extends Component
{
    public $search = '';
    public $user;
    public $filtered_status = [];
    public $array_status = [];
    public $saved_value = null;

    public function mount($user)
    {
        $this->user = $user;
        $this->array_status = UserGameStatus::values();
        $this->filtered_status = $this->array_status;
    }
    public function status($value)
    {
        if($value == 'all'){
            $this->filtered_status = $this->array_status;
        }
        else if ($this->saved_value === $value) {
            $this->filtered_status = $this->array_status;
            $this->saved_value = null;
        } else {
            $this->filtered_status = [$value];
            $this->saved_value = $value;
            if($this->filtered_status == null ){
                $this->filtered_status = $this->array_status;
            }
        }
    }
    public function getFilteredGamesProperty()
    {
        $filteredGames = [];

        foreach ($this->filtered_status as $status) {
            $games = UserGameList::userGamesFilter($this->user->id, $status);

            if ($this->search) {
                $games->whereHas('game', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
            }

            $games = $games->get();

            if ($games->count()) {
                $filteredGames[$status] = $games;
            }
        }

        return $filteredGames;
    }

    public function render()
    {
        return view('livewire.game-search', [
            'filteredGames' => $this->filteredGames,
        ]);
    }
}
