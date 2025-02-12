<?php

namespace App\Livewire;

use App\Models\Game;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SequelsPrequelsRegister extends Component
{
    public $games;

    #[Validate('required|different:prequel')]
    public $sequel;

    #[Validate('required|different:sequel')]
    public $prequel;

    public function save()
    {
        $this->validate();

        $prequel_game = Game::find($this->prequel);
        $sequel_game = Game::find($this->sequel);

        if (!$prequel_game || !$sequel_game) {
            session()->flash('error', 'Invalid game selection.');
            return;
        }

        // Prevent duplicate relationships
        $prequel_game->sequels()->syncWithoutDetaching([$sequel_game->id]);

        session()->flash('message', 'Sequel-Prequel relationship added successfully!');
    }

    public function mount()
    {
        $this->games = Game::all();
    }

    public function render()
    {
        return view('livewire.sequels-prequels-register');
    }
}
