<?php

namespace App\Livewire;

use App\Models\VoiceActor;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterVoiceActorForum extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $name;
    #[Validate('required')]
    public $age;
    #[Validate('required|image|max:4000')]
    public $profile_img;
    #[Validate('required')]
    public $gender;

    public function save(){
        $this->validate();

        if($this->profile_img){
            $path = $this->profile_img->store('photos', 'public');
        }else{
            $path = '';
        }
        VoiceActor::create([
            'name' => $this->name,
            'age' => $this->age,
            'profile_image' => $path,
            'gender' => $this->gender,
        ]);

        $this->reset(['name', 'age', 'profile_img', 'gender']);

        session()->flash('status', 'Successfully registered.');
    }

    public function render()
    {
        return view('livewire.register-voice-actor-forum');
    }
}
