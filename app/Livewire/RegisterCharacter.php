<?php

namespace App\Livewire;

use App\Models\Character;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterCharacter extends Component
{
    use WithFileUploads; // Required for file uploads

    #[validate('required')]
    public $name;

    #[validate('required|image|max:4000')] // Image validation (1MB max size)
    public $profile_img;

    public $age;

    #[validate('required')]
    public $height;

    #[validate('required')]
    public $gender = true;

    public function save()
    {
        // Validate the input
        $this->validate();

        if ($this->profile_img) {
            // Store the uploaded profile image in the 'photos' folder under 'public' disk
            $path = $this->profile_img->store('photos', 'public');
        } else {
            $path = null;  // If no profile image is uploaded, set it to null
        }

        Character::create([
            'name' => $this->name,
            'profile_image' => $path,
            'age' => $this->age,
            'height' => $this->height,
            'gender' => $this->gender,
        ]);

        $this->reset();

        session()->flash('message', 'Character created successfully.');
    }

    public function render()
    {
        return view('livewire.register-character');
    }
}
