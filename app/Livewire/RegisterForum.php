<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class RegisterForum extends Component
{
    use WithFileUploads; // This trait is needed for file uploads

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required|min:5')]
    public $password = '';

    #[Validate('required')]
    public $name = '';

    #[Validate('image|max:4000')]  // Validation for the profile image
    public $profile_img = '';  // This will hold the uploaded image file

    public function save()
    {
        // Run validation
        $this->validate();
        $this->name = str_replace(' ', '-', trim($this->name));
        // Handle the profile image upload
        if ($this->profile_img) {
            // Store the uploaded profile image in the 'photos' folder under 'public' disk
            $path = $this->profile_img->store('photos', 'public');
        } else {
            $path = null;  // If no profile image is uploaded, set it to null
        }
        // Create new user in the User model
        User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),  // Always hash passwords before saving
            'name' => $this->name,
            'profile_image' => $path,  // Save the file path to the database
        ]);

        // Reset the component properties
        $this->reset();

        // Flash a success message to the session
        session()->flash('status', 'Successfully registered.');

        // Redirect to home or any page
        return redirect()->route('login-page');
    }

    public function render()
    {
        return view('livewire.register-forum');
    }
}
