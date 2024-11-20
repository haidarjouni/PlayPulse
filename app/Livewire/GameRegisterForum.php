<?php

namespace App\Livewire;

use App\Models\Game;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
class GameRegisterForum extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $description;

    #[Validate('image|required|size:4000')]
    public $image;

    #[Validate('required')]
    public $duration;

    #[Validate('required')]
    public $status;
    #[Validate('required')]
    public $source;
    #[Validate('required')]
    public $dev_date;

    public $release_date;

    public function save(){

        if($this->image){
            $path = $this->image->store('photos', 'public');
        }else{
            $path = null;
        }

        Game::create([
            'name' => $this->name,
            'description' => $this->description,
            'profile_image' => $path,
            'duration' => $this->duration,
            'status' => $this->status,
            'source' => $this->source,
            'dev_date' => $this->dev_date,
            'release_date' => $this->release_date,
        ]);

        $this->reset();

        session()->flash('message', 'Game successfully registered.');
    }
    public function render()
    {
        return view('livewire.game-register-forum');
    }
}
