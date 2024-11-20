<?php

namespace App\Livewire;

use App\Models\Character;
use App\Models\Game;
use App\Models\VoiceActor;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RelationRegisterForum extends Component
{
    public $games;
    public $characters;
    public $voice_actors;

    #[Validate('required')]
    public $selected_game;

    #[Validate('required')]
    public $selected_character;

    #[Validate('required')]
    public $selected_voice_actor;
    #[Validate('required')]
    public $selected_role;
    public function mount()
    {
        $this->games = Game::all();
        $this->characters = Character::all();
        $this->voice_actors = VoiceActor::all();
    }

    public function save(){
        $this->validate();
        $game = Game::find($this->selected_game);
        if ($game) {
            $game->characters()->attach($this->selected_character, [
                'voice_actor_id' => $this->selected_voice_actor,
                'role' => $this->selected_role,
            ]);
            session()->flash('success', 'Data saved successfully!');
        } else {
            session()->flash('error', 'Game not found.');
        }
    }

    public function render()
    {
        return view('livewire.relation-register-forum', [
            'game' => $this->games,
            'character' => $this->characters,
            'voice_actors' => $this->voice_actors,
        ]);
    }
}
