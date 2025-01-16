<?php

namespace App\Livewire;

use App\Models\Game;
use App\Models\Genre;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;

class GameGenre extends Component
{
    public $games;
    public $genres;
    public $selected_genre;
    public $selected_game;

    public function save(){
        $game = Game::find($this->selected_game);
        $genre = Genre::find($this->selected_genre);
        $timestamp = Carbon::now();

        $game->genres()->attach($this->selected_genre,[
            'slug' => Str::slug($genre->name),
            'created_at' => $timestamp,
            'updated_at' => $timestamp,
        ]);
    }

    public function mount(){
        $this->genres = Genre::get();
        $this->games = Game::select('id','name')->get();
    }

    public function render()
    {
        return view('livewire.game-genre');
    }
}
